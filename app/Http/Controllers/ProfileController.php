<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // public function index()
    // {
    //     $data = User::paginate(5);
    //     return view('Profile.pengguna', compact('data'));
    // }

    // public function tambah_pengguna()
    // {
    //     return view('Profile.tambah');
    // }

    // public function edit(User $pengguna)
    // {
    //     $admin_lecture = 1;
    //     return view('Profile.tambah', compact('admin_lecture', 'pengguna'));
    // }

    // public function create(Request $request)
    // {
    //     User::create([
    //         'name' => $request->nama,
    //         'level' => $request->level,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password)
    //     ]);

    //     return redirect()->route('Profile.pengguna');
    // }

    // public function update(Request $request, User $pengguna)
    // {
    //     $pengguna->update([
    //         'name' => $request->nama,
    //         'level' => $request->level,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'foto' => $request->foto
    //     ]);

    //     return redirect()->route('Profile.pengguna');
    // }
    public function profile($request,$id)
    {
        // if (auth()->user()->level == 'admin') {

        // } else {
            
        $data = User::find(auth()->user()->id);
        // $data->update($request->all());
        // if($request->hasFile('foto')){
        //     $request->file('foto')->move('img/',$request->file('foto')->getClientOriginalName());
        //     $data->foto = $request->file('foto')->getClientOriginalName();
        //     $data->save();
        // }

        // dd($profile);
        return view('Profile.profile', compact(['data']));
        // }
    }

    public function detail($id)
    {
        $data = User::find($id);
        // $profile = User::find($siswa->profile);
        // dd($profile);
        return view('Profile.profile', compact(['data']));
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

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
         //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
    public function destroy(string $id)
    {
        //
    }
}
