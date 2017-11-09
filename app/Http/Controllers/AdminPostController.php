<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Post;
use App\Photo;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*$posts = Post::all();*/
        $posts = Post::paginate(2);
        return view('admin.posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::pluck('name','id')->all();
        return view('admin.posts.create' , compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){

            $name = $file->getClientOriginalName();
            $file->move('images' , $name);
            $photo = Photo::create(['photo_path' => $name]);
            $input['photo_id'] = $photo->id;
            
        }

       $user->post()->create($input);
       $request->session()->flash('create_post','The post has been created');
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts = Post::findOrFail($id);
        $category = Category::pluck('name' ,'id')->all();
        return view('admin.posts.edit' , compact('posts','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $id)
    {
        //
        $input = $request->all();
        $posts = Post::findOrFail($id);

        if($file = $request->file('photo_id')){
          $name = $file->getClientOriginalName();
          $file->move('images' , $name);
          $photo = Photo::create(['photo_path' => $name ]);
          $input['photo_id'] = $photo->id;
        }

        Auth::user()->post()->whereId($id)->first()->update($input);
        return redirect ('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $posts = Post::findOrFail($id);
        unlink(public_path() .'/images/'. $posts->photo->photo_path );
        $posts->delete();
        return redirect ('/admin/posts');
    }


    public function post($slug){
        $post = Post::findBySlugOrFail($slug);
        $comments = $post->comment()->whereIsActive(1)->get();
        return view('post',compact('post' , 'comments'));
    }
}



