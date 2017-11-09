<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = $file->getClientOriginalName();
            $file->move('images' , $name);
            $photo = Photo::create(['photo_path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'is_active' => $request->is_active,
            'photo_id'  => $input['photo_id'] = $photo->id,
            'password'  => bcrypt($request->password)
        ]);

        $request->session()->flash('user_create' , 'The user has been created!!');
        return redirect('/admin/users');



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

        $users = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit' , compact('roles','users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $user  = User::findOrFail($id);

        if(trim($request->password == '')){

            $input = $request->except('password');
        
        }else{
            
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file  =  $request->file('photo_id')){
            $name = $file->getClientOriginalName();
            $file->move('images' ,$name);
            $photo = Photo::create(['photo_path' => $name]);
            $input['photo_id'] = $photo->id;
        }



        $user->update($input);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        //

        $input = $request->all();
        $user  = User::findOrFail($id);

        unlink(public_path() .'/images/'. $user->photo->photo_path );
        $user->delete();
        $request->session()->flash('user_delete','The user has been deleted');
        return redirect('/admin/users');
    }
}
