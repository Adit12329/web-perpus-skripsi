<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Image;

class UploadGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function upload_resize(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        //Tentukan path lokasi upload
        $path = public_path('Gambar/logo');

        //Mengambil file image dari form
        $file = $request->file('file');

        //Membuat nama file dari gabungan tanggal dan uniqid()\
        $filename = 'logo_'. uniqid() . '.' . $file->getClientOriginalExtension();

        //Membuat canvas image sebesar dimensi
        $canvas = Image::canvas(200, 200);

        //Resize image sesuai dimensi  dengan mempertahankan ratio
        $resizeimage = Image::make($file)->resize(null, 200, function($constraint){
            $constraint->aspectRatio();
        });
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
