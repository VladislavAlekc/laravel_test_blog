<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {


        // $session = session();
        // $foo = $session->get('foo');
        // dd($foo);

        return view('pages.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $ip = $request->ip();
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $remember = $request->boolean('remember');


        // dd($email, $password, $remember, $ip);
        alert(__('Добро пожаловать!'));
        //session(['alert' => __('Добро пожаловать!')]);
        // if (true) {
        //     return redirect()->back()->withInput();
        // }

        return redirect()->route('user.posts.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
