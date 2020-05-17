<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $data['users'] = User::all();
        return view('users.index', $data);
    }

    public function create()
    {
        return view('users.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return redirect()->route('users.index');
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
        $data['resource'] = User::find($id);
        return view('users.edit', $data);
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
        $data = $request->except('password');

        if($request->input('password')){
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::find($id);

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('users.index');
    }

}
