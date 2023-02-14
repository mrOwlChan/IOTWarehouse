<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\Subdistrict;
use App\Models\UrbanVillage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data user di table users
        $user = User::find(auth()->user()->id);

        return view('myprofile.index', ['user' => $user]);
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
    public function edit(Request $request, User $user, $param)
    {
        // Proses validasi password
        $credential = $request->validate([
            'passwordEditProfile' => 'required'
        ]);

        // Ambil data user email dan password untuk dicek kesesuaiannya
        $userData = [
            'email'     => $user->email,
            'password'  => $request->passwordEditProfile
        ];

        // Jika password user sesuai
        if (Auth::attempt($userData)) {
            // Ambil data province di table provinces
            $provinces = Province::all();

            return view('myprofile.mybiodata_edit', ['user' => $user, 'provinces' => $provinces]);
        }

        // Jika password user tidak sesuai redirect ke url /myprofile
        return redirect('/myprofile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $param)
    {
        // Proses validasi data
        $validatedData = $request->validate([
            'name'                  => 'required',
            'email'                 => ['required', 'email:rfc,dns'],
            'phone'                 => ['required','starts_with:+'],
            'birth_date'            => ['required','date'],
            'birth_city'            => ['required'],
            'province'              => ['required'],
            'city'                  => ['required'],
            'subdistrict'           => ['required'],
            'urban_village'         => ['required'],
            'urban_village_postal'  => ['required'],
            'address_street'        => ['required']   
        ]);

        // Proses input data ke table subdistricts
        // Proses Cek data city_id pada table subdistricts = $validatedData['city']
        $subdistrict = Subdistrict::where('city_id', $validatedData['city'])->get();
        $subdistrict = collect($subdistrict)->values();

        if ($subdistrict->all() == []) {
            // Jika $validatedData['city'] tidak ada, maka simpan data dari proses edit data
            Subdistrict::create([
                'city_id'   => $validatedData['city'],
                'name'      => $validatedData['subdistrict']
            ]);

            // Proses Input data ke table urban_villages
            // Proses Cek data name pada table urban_villages = $validatedData['urban_village']
            $urbanvillage = UrbanVillage::where('name', $validatedData['urban_village'])->get();
            $urbanvillage = collect($urbanvillage)->values();

            if ($urbanvillage->all() == []) {
                UrbanVillage::create([
                    'name'                  => $validatedData['urban_village'],
                    'urban_village_code'    => $validatedData['urban_village_postal'],
                    'subdistrict_id'        => $validatedData['city']   
                ]); 
            }// /.proses input data ke table urban_villages

        }// /.proses input data ke table subdistricts

        // Proses Input data ke table 
        $subdistrict_id = Subdistrict::where('name', $validatedData['subdistrict'])
                                        ->where('city_id', $validatedData['city'])
                                        ->get();

        // 
        $urbanvillage_id = UrbanVillage::where('urban_village_code', $validatedData['urban_village_postal'])->get();

        // 
        User::where('id', $user->id)->update([
                                                'name'              => $validatedData['name'], 
                                                'email'             => $validatedData['email'],
                                                'phone'             => $validatedData['phone'],
                                                'birth_date'        => $validatedData['birth_date'],
                                                'birth_city'        => $validatedData['birth_city'],
                                                'address_street'    => $validatedData['address_street'],
                                                'city_id'           => $validatedData['city'],
                                                'subdistrict_id'    => $subdistrict_id[0]['id'],
                                                'urban_village_id'  => $urbanvillage_id[0]['id']
                                            ]);

        // Redirect ke halaman login dengan pesan
        return redirect('/myprofile')->with('edit_profile_success', '');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus Foto
        
    }

    public function updatePhoto(Request $request, User $user){
        // Proses validasi input data image
        $validated = $request->validate([
            'photo' => ['image','file','max:3072'] // dalam satuan kB (1 MB = 1024 kB)
        ]);

        // Hapus photo sebelumnya jika ada
        if ($request->prevPhoto != ''){
            Storage::delete($request->prevPhoto);

            // Kosongkan field photo pada table userdetails sesuai user id
            User::where('id', $user->id)->update([
                'photo' => ''
            ]);
        }

        // Nama Folder tempat menyimpan gambar adalah sesuai email user
        $validated = $request->file('photo')->store('users/'.$user->email.'/photo_profile');

        User::where('id', $user->id)->update([
            'photo' => $validated
        ]);

        return redirect('/myprofile');
        // return dd($request);
    }
}
