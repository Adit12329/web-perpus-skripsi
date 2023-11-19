<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TambahData;
use App\Models\User;
use Illuminate\Http\Request;

class TeknisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TambahData::where('status_buku', '=', 'active')->get();
        if (auth()->user()->level == 'admin') {
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
                ->where('tambahdata.kategori_buku', '=', 'Majalah')
                ->latest('tambahdata.tanggal_peminjaman')
                ->select(['tambahdata.*', 'users.name'])
                ->paginate(5);
            // dd($data);
        } else {
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
                ->where('users.id', '=', auth()->user()->id)
                ->where('tambahdata.kategori_buku', '=', 'Majalah')
                ->latest('tambahdata.tanggal_peminjaman')
                ->select(['tambahdata.*', 'users.name'])
                ->paginate(5);
            // dd($data);
        }

        return view('Teknis.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all();
        return view('Teknis.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($id_pengguna);
        TambahData::create([
            'nomor_buku' => $request->nomor_buku,
            'kategori_buku' => 'Majalah',
            'profile' => $request->pemilik,
            'judul_buku' => $request->judul_buku,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'letak_buku' => $request->letak_buku,
            'upload_buku' => $request->upload_buku,
        ]);
        return redirect()
            ->route('teknis.index')
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
    public function edit(TambahData $tekni)
    {
        // dd($tekni);
        $admin_lecture = 1;
        $data = User::find($tekni->profile);
        // $edit = TambahData::findorfail($tekni);
        return view('teknis.tambah', compact('tekni', 'admin_lecture', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $tekni)
    {
        $edit = TambahData::findorfail($tekni);
        $edit->update($request->all());
        return redirect('tekni');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $tekni)
    {
        $del = TambahData::findorfail($tekni);
        $del->delete();
        return back();
    }

    public function accept_teknis($id)
    {
        // dd($id);
        $data = TambahData::find($id);
        $data->status_buku = 1;
        $data->save();

        return redirect('/teknis');
    }

    public function reject_teknis($id)
    {
        // dd($id);
        $data = TambahData::find($id);
        $data->status_buku = 2;
        $data->save();
        return redirect('/teknis');
    }
}
