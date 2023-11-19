<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BukuInduk;
use App\Models\Kategori;
use App\Models\TambahData;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->level == 'admin') {
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
                ->where('tambahdata.status_buku', '=', '1')
                ->latest('tambahdata.tanggal_peminjaman')
                ->select(['tambahdata.*', 'users.name'])
                ->paginate(5);
            // dd($data);
        } else {
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
                ->where('users.id', '=', auth()->user()->id)
                ->where('tambahdata.status_buku', '=', '1')
                ->latest('tambahdata.tanggal_peminjaman')
                ->select(['tambahdata.*', 'users.name'])
                ->paginate(5);
            // dd($data);
        }

        return view('Peminjaman.index', compact(['data']));
    }

    public function caribuku(Request $request)
    {
        $data = BukuInduk::leftjoin('kategori_buku', 'bukuinduk.kategori', '=', 'kategori_buku.id_kategori')->where('bukuinduk.nomor_buku', $request->nobuku)->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = BukuInduk::leftjoin('kategori_buku', 'bukuinduk.kategori','=','kategori_buku.id_kategori')->where('bukuinduk.nomor_buku', '011')->get(['kategori_buku.nama_kategori','bukuinduk.*']);
        // dd($data);
        $data = User::all();
        $bukuinduk = BukuInduk::all();
        $kategori = Kategori::all();
        return view('Peminjaman.tambah', compact('bukuinduk', 'kategori', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        TambahData::create([
            'nomor_buku' => $request->nomor_buku,
            'kategori_buku' => $request->ktbuku,
            'profile' => $request->pemilik,
            'judul_buku' => $request->judul_buku,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'letak_buku' => $request->letak_buku,
            'quantity' => $request->quantity,
            // 'upload_buku' => $request->upload_buku,
            'status_buku' => "1"
        ]);
        return redirect()
            ->route('peminjaman.index')
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
    public function edit(TambahData $peminjaman)
    {
        // $peminjaman = $peminjaman;
        // dd($peminjaman);
        $admin_lecture = 1;
        $data = User::find($peminjaman->profile);
        $bukuinduk = BukuInduk::all();

        $kategori = Kategori::all();

        // dd($kategori);
        // $edit = TambahData::findorfail($peminjaman);
        return view('peminjaman.tambah', compact('peminjaman', 'admin_lecture', 'data', 'bukuinduk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $peminjaman)
    {
        $edit = TambahData::findorfail($peminjaman);
        $edit->update($request->all());
        return redirect('peminjaman');
    }


public function cetakData()
    {
        $ctkdata = TambahData::get();
        // $ctkdata = User::get();
        return view('Peminjaman.cetakdata', compact(['ctkdata']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $peminjaman)
    {
        $del = TambahData::findorfail($peminjaman);
        $del->delete();
        return back();
    }

    public function accept_peminjaman($id)
    {
        // dd($id);
        $data = TambahData::find($id);
        $data->status_buku = '1';
        $data->save();

        return redirect('/peminjaman');
    }

    public function reject_peminjaman($id)
    {
        // dd($id);
        $data = TambahData::find($id);
        // dd($data);
        $data->status_buku = '2';
        $data->save();
        return redirect('/peminjaman');
    }

    public function borrowBook($id)
    {
        $data = BukuInduk::findOrFail($id);

        if ($data->quantity > 0) {
            $data->decrement('quantity');
            // Proses peminjaman buku lainnya
            // return redirect()->route('library.index');
        } else {
            // Tampilkan pesan jika stok buku habis
        }
    }

    public function returnBook($id)
    {
        $data = BukuInduk::findOrFail($id);

        $data->increment('quantity');
        // Proses pengembalian buku lainnya
        // return redirect()->route('library.index');
    }
}
