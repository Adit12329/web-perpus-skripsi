<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BukuInduk;
use App\Models\TambahData;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = TambahData::where('status_buku', '=', 'active')->get();
        // // dd(auth()->user()->level);
        // if (auth()->user()->level == "admin") {
        //     $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')->latest('tambahdata.tanggal_peminjaman')->select(['tambahdata.*', 'users.name'])->paginate(5);
        // }else{
        //     $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
        //     ->where('users.id', '=', auth()->user()->id)
        //     ->latest('tambahdata.tanggal_peminjaman')
        //     ->select(['tambahdata.*', 'users.name'])
        //     ->paginate(5);
        // }
        $bukuinduk = BukuInduk::leftjoin('kategori_buku', 'bukuinduk.kategori', '=', 'kategori_buku.id_kategori')->get(['kategori_buku.nama_kategori', 'bukuinduk.*' ]);
        $data = User::all();
        // $pengguna = User::find(auth()->user()->id);
        // dd($pengguna);
        $var_nama = "aditya";
        return view('HalamanDepan.beranda', compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahdata');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
