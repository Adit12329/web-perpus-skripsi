<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\KirimEmail;
use App\Mail\SendEmail;
use App\Models\TambahData;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class EmailController extends Controller
{
    public function sendnotification()
    {
        $isi_email = [
            'title' => 'EMAIL LARAVEL 8',
            'body' => 'SELAMAT DATANG'
        ];
        $tujuan = 'madityamartono@gmail.com';
        Mail::to($tujuan)->send(new SendEmail($isi_email));
        return 'Berhasil mengirim email';
    }
    // dd('$isi_email');
    // Mail::to('madityamartono@gmail.com')->send(new SendEmail);
    // return 'ini adalah tutorial email';

    public function index($id)
    {
        $buku = TambahData::find($id);
        $data = User::select('tambahdata.*', 'users.name', 'users.email')
            ->where('tambahdata.id', '=', $buku->id)
            ->where('users.id', '=', $buku->profile)
            ->leftjoin('tambahdata', 'users.id', '=', 'tambahdata.profile')
            ->get();
        // dd($data);
        $isi_email = [
            'judul' => 'Waktu Pengembalian Buku',
        ];
        $tujuan = 'madityamartono@gmail.com';
        Mail::to($data[0]->email)->send(new KirimEmail($isi_email, $data));
        // return view('Email.Email');
        return redirect('/peminjaman');
    }
}
