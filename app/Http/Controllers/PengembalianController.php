<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BukuInduk;
use App\Models\TambahData;
use App\Models\User;
use App\Models\Verifikasi;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->level == 'admin') {
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
                ->where('tambahdata.status_buku', '=', '2')
                ->latest('tambahdata.tanggal_peminjaman')
                ->select(['tambahdata.*', 'users.name'])
                ->paginate(5);
            // dd($data);
        } else {
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
                ->where('users.id', '=', auth()->user()->id)
                ->where('tambahdata.status_buku', '=', '2')
                ->latest('tambahdata.tanggal_peminjaman')
                ->select(['tambahdata.*', 'users.name'])
                ->paginate(5);
            // dd($data);
        }

        return view('Pengembalian.index', compact(['data']));
    }

    public function caribuku(Request $request){
        $data = BukuInduk::leftjoin('kategori_buku', 'bukuinduk.kategori','=','kategori_buku.id_kategori')->where('bukuinduk.nomor_buku', $request->nobuku)->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all();
        return view('Pengembalian.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($id_pengguna);
        TambahData::create([
            'nomor_buku' => $request->nomor_buku,
            'kategori_buku' => $request->kategori_buku,
            'profile' => $request->pemilik,
            'judul_buku' => $request->judul_buku,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'letak_buku' => $request->letak_buku,
            // 'upload_buku' => $request->upload_buku,
            'status_buku' => "0"
        ]);
        return redirect()
            ->route('pengembalian.index')
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
    public function edit(TambahData $pengembalian)
    {
        // dd($pengembalian);
        $admin_lecture = 1;
        $data = User::find($pengembalian->profile);
        // $edit = TambahData::findorfail($pengembalian);
        return view('pengembalian.tambah', compact('pengembalian', 'admin_lecture', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pengembalian)
    {
        dd($request);
        $edit = TambahData::findorfail($pengembalian);
        $edit->update($request->all());
        return redirect('pengembalian');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $pengembalian)
    {
        $del = TambahData::findorfail($pengembalian);
        $del->delete();
        return back();
    }

    public function accept_pengembalian($id)
    {
        // dd($id);
        $data = TambahData::find($id);
        $data->status_buku = '2';
        $data->save();

        return redirect('/pengembalian');
    }

    public function reject_pengembalian($id)
    {
        // dd($id);
        $data = TambahData::find($id);
        $data->status_buku = '1';
        $data->save();
        return redirect('/pengembalian');
    }
}
