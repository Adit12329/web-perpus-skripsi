<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BukuInduk;
use App\Models\TambahData;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class TambahDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = TambahData::paginate(5);
        if (auth()->user()->level == "admin") {
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')->latest('tambahdata.waktu_pelaksanaan')->select(['tambahdata.*', 'users.name'])->paginate(5);
        }else{
            $data = TambahData::join('users', 'tambahdata.profile', '=', 'users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->latest('tambahdata.waktu_pelaksanaan')
            ->select(['tambahdata.*', 'users.name'])
            ->paginate(5);
            // dd($data);
            
        }
        // dd($data);
        return view('tambahdata', compact(['data']));
    }

    // public function cetakData()
    // {
    //     $ctkdata = TambahData::get();
    //     $ctkdata = User::get();
    //     return view('Peminjaman.cetakdata', compact(['ctkdata']));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createdata');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_pengguna = User::where('name','=', $request->pemilik)->get('users.id');
        // dd($id_pengguna);
        TambahData::create([
            'nomor_buku' => $request->nomor_buku,
            'nama_diklat' => $request->nama_diklat,
            'profile' => $id_pengguna[0]->id,
            'penyelenggara_diklat' => $request->penyelenggara_diklat,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'tanggal_sertifikat' => $request->tanggal_sertifikat,
            'jumlah_jp' => $request->jumlah_jp,
            'upload_sertifikat' => $request->upload_sertifikat
        ]);
        return redirect('tambahdata')->with('success', 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = TambahData::all();
        return view('showdata', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit = TambahData::findorfail($id);
        return view('editdata', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $edit = TambahData::findorfail($id);
        $edit->update($request->all());
        return redirect('tambahdata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del = TambahData::findorfail($id);
        $del->delete();
        return back();
    }

    public function cetakForm()
    {
        return view('cetaktanggal');
    }

    public function cetakdataPertanggal($tanggalawal, $tanggalakhir)
    {
        $cetakdataPertanggal = TambahData::whereBetween('waktu_pelaksanaan', [$tanggalawal, $tanggalakhir]);
        return view('cetakdatapertanggal', compact(['cetakdataPertanggal']));
    }
}
