<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Redirect ke halaman registrasi user
        return view('auth.register');
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
        // Proses validasi data
        $validatedData = $request->validate([
            'name'              => ['required', 'max:50', 'min:7'],
            'email'             => ['required', 'email:rfc,dns', 'unique:users'],
            'password'          => ['required', 'max:100', 'min:5'],
            'retype_password'   => 'same:password'
        ]);

        // Prose Encryption Password
        // $validatedData['password'] = bcrypt($validatedData['password']); // Menggunakan fungsi bcrypt() bawaan PHP
        $validatedData['password'] = Hash::make($validatedData['password']); //Menggunakan method static Hash::make() bawaan Laravel

        // Jika data memenuhi syarat validasi, input data tersebut ke database
        User::create([
            'name'      => $validatedData['name'],
            'email'     => $validatedData['email'],
            'password'  => $validatedData['password']
        ]);

        // Redirect ke halaman login dengan pesan
        return redirect('/login')->with('reg_success', 'Proses registrasi akun Anda sukses. Silahkan untuk login.');
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
