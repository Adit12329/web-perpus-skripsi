<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TambahData;
use App\Models\User;
use Illuminate\Http\Request;

class TeknisSatuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TambahData::where('status_buku', '=', 'active')->get();
        if (auth()->user()->level == 'admin') {
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
                ->where('tambahdata.kategori_buku', '=', 'Dongeng')
                ->latest('tambahdata.tanggal_peminjaman')
                ->select(['tambahdata.*', 'users.name'])
                ->paginate(5);
            // dd($data);
        } else {
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
                ->where('users.id', '=', auth()->user()->id)
                ->where('tambahdata.kategori_buku', '=', 'Dongeng')
                ->latest('tambahdata.tanggal_peminjaman')
                ->select(['tambahdata.*', 'users.name'])
                ->paginate(5);
            // dd($data);
        }

        return view('TeknisSatu.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all();
        return view('TeknisSatu.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($id_pengguna);
        TambahData::create([
            'nomor_buku' => $request->nomor_buku,
            'kategori_buku' => 'Dongeng',
            'profile' => $request->pemilik,
            'judul_buku' => $request->judul_buku,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'letak_buku' => $request->letak_buku,
            'upload_buku' => $request->upload_buku,
        ]);
        return redirect()
            ->route('teknissatu.index')
            ->with('success', 'Task Created Successfully!');
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
    public function edit(TambahData $teknissatu)
    {
        // dd($teknissatu);
        $admin_lecture = 1;
        $data = User::find($teknissatu->profile);
        // $edit = TambahData::findorfail($teknissatu);
        return view('teknissatu.tambah', compact('teknissatu', 'admin_lecture', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $teknissatu)
    {
        $edit = TambahData::findorfail($teknissatu);
        $edit->update($request->all());
        return redirect('teknissatu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $teknissatu)
    {
        $del = TambahData::findorfail($teknissatu);
        $del->delete();
        return back();
    }

    public function accept_satu($id)
    {
        // dd($id);
        $data = TambahData::find($id);
        $data->status_buku = 1;
        $data->save();

        return redirect('/teknissatu');
    }

    public function reject_satu($id)
    {
        // dd($id);
        $data = TambahData::find($id);
        $data->status_buku = 2;
        $data->save();
        return redirect('/teknissatu');
    }
}
