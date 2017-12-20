<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function loginform()
    {
        return view('login');
    }


    public function login($request)
    {

        $user = \App\Buddy::where('email' , $request->input('username'))->where('password', $request->input('password'))->first();
        if(isset($user)){
            session_start();
            $_SESSION["isLogged"] = true;


            return redirect('/sk/')->with('status', 'success');
        } else {
            return view('login', ['email' => $request->input('username')]);
        }

        var_dump($request->input('username'));
        var_dump($request->input('passwword'));
        die('request');
    }

    public function logout()

    {
        session_start();

        if(isset($_SESSION["isLogged"])){
            unset($_SESSION["isLogged"]);
        }
        return redirect('/sk/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }
}
