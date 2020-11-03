<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = users::all();
        return view('page.index',compact('data',$data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'dob'=>'required'
        ]);
        users::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = users::find($id);
        return view('page.edit',compact('data',$data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'dob'=>'required',
        ]);
        $users = users::find($request->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->gender = $request->gender;
        $users->dob = $request->dob;
        $users->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users,$id)
    {
        $users = users::find($id);
        $users->delete();
        return redirect('/');
    }
}
