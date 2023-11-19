<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = User::paginate(5);
        return view('Profile.pengguna', compact('data'));
    }

    public function tambah_pengguna()
    {
        return view('Profile.tambah');
    }

    public function edit(User $pengguna)
    {
        $admin_lecture = 1;
        return view('Profile.tambah', compact('admin_lecture', 'pengguna'));
    }

    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
            // \App\Models\User::create($request->all());
        return redirect()->route('pengguna');
    }

    public function update(Request $request, User $pengguna)
    {
        $pengguna->update([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $request->foto
        ]);
        // $pengguna = User::find(auth()->user()->id);
        // $pengguna->update($request->all());
        // if($request->hasFile('foto')){
        //     $request->file('foto')->move(public_path().'img/',$request->file('foto')->getClientOriginalName());
        //     $pengguna->foto = $request->file('foto')->getClientOriginalName();
        //     $pengguna->save();
        // }

        return redirect()->route('pengguna');
    }

    public function detail($id)
    {
        $data = User::find($id);
        // $profile = User::find($siswa->profile);
        // dd($profile);
        return view('Profile.tambah', compact(['data']));
    }

    public function destroy(string $pengguna)
    {
        $del = User::findorfail($pengguna);
        $del->delete();
        return back();
    }
    // public function store(Request $request)
    // {
    //      dd($request->all());
    // }
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

    //     return redirect()->route('pengguna');
    // }

    // public function update(Request $request, User $pengguna)
    // {
    //     if ($request->hasFile('foto')) {
    //         $file = $request->file('foto');
    //         $namaFile = $file->getClientOriginalName();
    //         $file->move(public_path('img'), $namaFile);

    //         $pengguna->foto = $namaFile;
    //     }

    //     $pengguna->name = $request->nama;
    //     $pengguna->level = $request->level;
    //     $pengguna->email = $request->email;
    //     $pengguna->password = bcrypt($request->password);
    //     $pengguna->save();

    //     return redirect()->route('pengguna');
    // }

    // public function destroy(User $pengguna)
    // {
    //     // Hapus foto profil dari server jika ada
    //     if (!empty($pengguna->foto)) {
    //         $file_path = public_path('img/'.$pengguna->foto);
    //         if (file_exists($file_path)) {
    //             unlink($file_path);
    //         }
    //     }

    //     // Hapus pengguna dari database
    //     $pengguna->delete();

    //     return redirect()->route('pengguna');
    // }
}