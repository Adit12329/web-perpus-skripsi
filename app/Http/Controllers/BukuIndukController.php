<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BukuInduk;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class BukuIndukController extends Controller
{
    public function index()
    {
        $bukuinduk = BukuInduk::leftjoin('kategori_buku', 'bukuinduk.kategori', '=', 'kategori_buku.id_kategori')
            ->leftjoin('tambahdata', 'bukuinduk.nomor_buku', '=', 'tambahdata.nomor_buku')
            ->get(['kategori_buku.nama_kategori', 'bukuinduk.*', 'tambahdata.status_buku']);
        // dd($bukuinduk);
        $data = User::all();
        // if (auth()->user()->level == 'admin') {
        //     $data = BukuInduk::join('users', 'bukuinduk.pengarang', '=', 'users.id')
        //         ->where('bukuinduk.letak_buku', '=', 'Novel')
        //         ->latest('bukuinduk.sumber')
        //         ->select(['bukuinduk.*', 'users.name'])
        //         ->paginate(5);
        //     // dd($data);
        // } else {
        //     $data = BukuInduk::join('users', 'bukuinduk.pengarang', '=', 'users.id')
        //         ->where('users.id', '=', auth()->user()->id)
        //         ->where('bukuinduk.letak_buku', '=', 'Novel')
        //         ->latest('bukuinduk.sumber')
        //         ->select(['bukuinduk.*', 'users.name'])
        //         ->paginate(5);
        //     // dd($data);
        // }


        return view('bukuinduk.index', compact((['bukuinduk', 'data'])));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Kategori::all();
        return view('bukuinduk.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        BukuInduk::create([
            'nomor_buku' => $request->nomor_buku,
            'pengarang' => $request->pengarang,
            'letak_buku' => $request->letak_buku,
            'judul_buku' => $request->judul_buku,
            'kategori' => $request->kategori_buku,
            'sumber' => $request->sumber,
            'tahun_terbit' => $request->tahun_terbit,
            'detail_buku' => $request->detail_buku,
            'upload_buku' => $request->upload_buku,
            'quantity' => $request->quantity,
        ]);
        return redirect()
            ->route('bukuinduk.index')
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
    public function edit(BukuInduk $bukuinduk)
    {
        // dd($fungsional);
        $admin_lecture = 1;
        $data = User::find($bukuinduk->id);
        $kategori = Kategori::all();
        // dd($kategori);
        // $edit = TambahData::findorfail($fungsional);
        return view('bukuinduk.tambah', compact('bukuinduk', 'admin_lecture', 'data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $bukuinduk)
    {
        $edit = BukuInduk::findorfail($bukuinduk);
        $edit->update($request->all());
        return redirect('bukuinduk');
    }

    public function cetakbukuinduk()
    {
        $ctkdata = BukuInduk::get();
        return view('BukuInduk.cetakdata', compact(['ctkdata']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $bukuinduk)
    {
        $del = BukuInduk::findorfail($bukuinduk);
        $del->delete();
        return back();
    }

    public function accept_bukuinduk($id)
    {
        // dd($id);
        $data = BukuInduk::find($id);
        $data->status_buku = 1;
        $data->save();

        return redirect('/bukuinduk');
    }

    public function reject_bukuinduk($id)
    {
        // dd($id);
        $data = BukuInduk::find($id);
        $data->status_buku = 2;
        $data->save();
        return redirect('/bukuinduk');
    }

    public function upload()
    {
        return view('BukuInduk.index');
    }

    // public function proses_upload(Request $request){
    //     $this->validate($request, [
    //         'file' => 'required',
    //     ]);
    //     // menyimpan data file yang diupload
    //     $file = $request->file('Gambar');
    //     // nama file
    //     echo 'Gambar: '.$file->getClientOriginalName(). '<br>';
    //     // ekstensi file
    //     echo 'jpg: '.$file->getClientOriginalName(). '<br>';
    //     // ukuran file
    //     echo '20mb: '.$file->getSize(). '<br>';
    //     // tipe mime
    //     echo 'file type mime: '.$file->getMimeType();
    //     // isi dengan nama folder yang dituju
    //     $tujuan_upload = 'public/Gambar';
    //     $file->move($tujuan_upload, $file->getClientOriginalName());
    // }

    public function countbuku()
    {
        $hasil_buku = [];
        $bukuinduk = DB::table('quantity')->get();

        foreach ($bukuinduk as $value) {
            $peminjaman = DB::table('quantity')
            ->where('judul_buku', $value->id)
            ->where('status', '1')
            ->get();

            if (count($peminjaman) > 0)
            {
                $buku_qty = $value->quantity;

                foreach ($peminjaman as $pinjam) {
                    $buku_qty = $buku_qty - $pinjam->total_pinjaman;
                }

                $hasil_buku[] = array(
                    'buku' => $value->judul_buku,
                    'total_buku_tersedia' => $buku_qty,
                );
            }
        }
        return $hasil_buku;
    }

    public function borrowBook($id)
    {
        $bukuinduk = BukuInduk::findOrFail($id);

        if ($bukuinduk->quantity > 0) {
            $bukuinduk->decrement('quantity');
            // Proses peminjaman buku lainnya
            // return redirect()->route('library.index');
        } else {
            // Tampilkan pesan jika stok buku habis
        }
    }

    public function returnBook($id)
    {
        $bukuinduk = BukuInduk::findOrFail($id);

        $bukuinduk->increment('quantity');
        // Proses pengembalian buku lainnya
        // return redirect()->route('library.index');
    }
}
