<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests;
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
        $roles = Role::all();
        return view('admin.users.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
//        User::create($request->all());



        $input = $request->all();

        if ($file =  $request->file('photo_id')){
            $name  = time().$file->getClientOriginalName();
            $file->move('images' , $name);
            $photo =  Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->password);
        User::create($input);
        Session::flash('session_created', 'user has been created');

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
        $roles = Role::all();
        $user =   User::findOrFail($id);
        return view('admin.users.edit' , compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if (empty($request->password)){
            $input  = $request->except('password');
        } else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        $input = $request->all();
        if($file= $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images' ,$name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        Session::flash('session_updated', 'user has been updated');
        $user->update($input);
        return redirect('/admin/users');
//        return $request->all();
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
        $user  = User::findOrFail($id);
        if ($user->photo_id !== ''){
        unlink(public_path().$user->photo->path);
        $user->delete();
            Session::flash('session_delete', 'user has been deleted');
            return redirect('/admin/users');

        }else{
            $user->delete();
            Session::flash('session_delete', 'user has been deleted');
            return redirect('/admin/users');

        }
        }
}
