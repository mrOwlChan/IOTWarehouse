<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        // Proses validasi data input dari form login 
        $validationData = $request->validate([
            'email'     => ['required', 'email:rfc,dns'],
            'password'  => ['required', 'max:100', 'min:5']
        ]);

        // Jika Proses validasi data berhasil
        if (Auth::attempt($validationData)) {
            $request->session()->regenerate(); // Untuk menghindari teknik hacking session fixation

            return redirect()->intended('/dashboard'); // Redirect ke url tertentu melalui authentification middleware
        }

        // Kembali ke halaman sebelumnya jika proses validasi data gagal
        return back()->with('login_falied', 'Login gagal ! Silahkan login kembali !');
    }

    public function logout(Request $request){
        // Logout
        Auth::logout();

        $request->session()->invalidate(); // Agar session sebelumnyatidak dapat dipakai kembali setelah logout

        $request->session()->regenerateToken(); // Membuat kembali token agar tidak dibajak

        // Redirect ke page home
        return redirect('/');
    }
}
