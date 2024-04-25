<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo = Photo::join('albums', 'albums.AlbumID', '=', 'photos.AlbumID')
                   ->where('photos.UserID', '=', Auth::user()->UserID)
                   ->get();
                //    dd($photo);

        return view('admin.foto.index', compact('photo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $Album = Album::all(); // Ambil semua data album dari tabel album
    return view('admin.foto.create', compact('Album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $messages = [
            'required' => 'Silahkan isi kolom ini!',
            'max' => 'Tidak boleh lebih dari 100 karakter!',
            'image' => 'Anda hanya dapat mengunggah gambar!'
        ];
        
        $request->validate([
            'JudulFoto' => [
                'required',
                'max:100',
            ],
            'AlbumID' => 'required',
            'DeskripsiFoto' => 'required',
            'LokasiFile' => 'required|image',
            'TanggalUnggah' => 'required'
        ], $messages);
        // dd($request);
        $photo = new Photo;
        $photo->JudulFoto = $request->JudulFoto;
        $photo->AlbumID = $request->AlbumID;
        $photo->DeskripsiFoto = $request->DeskripsiFoto;
        $photo->TanggalUnggah = $request->TanggalUnggah;
        $photo->LokasiFile = $request->LokasiFile;
        $photo['UserID'] = auth()->user()->UserID;
        // dd($request->file('LokasiFile'));
        if ($request->hasFile('LokasiFile')) {
    $files = $request->file('LokasiFile');
    $path = public_path('public/photo-images');
    $files_name =  date('Ymd') . '_' . $files->getClientOriginalName();
    $files->storeAs('photo-images', $files_name);
    $photo->LokasiFile = $files_name;
}
        
        $photo->save();
        
        return redirect('/admin/foto')->with('success', 'Foto baru telah ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(int $photoId)
    {
        $photo = Photo::where('FotoID', $photoId)->first();
        $user = User::all();
        $album = Album::get();
        
        // Periksa jika photo ditemukan
        if (!$photo) {
            abort(404); // Tampilkan halaman 404 jika photo tidak ditemukan
        }
    
        return view('admin.foto.edit', compact(['photo','album', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $photoId)
{
    
    // Temukan foto berdasarkan photoId
    $photo = Photo::where('FotoID', $photoId)->first();
    
    // Perbarui atribut foto dengan data dari request
    $photo->JudulFoto = $request->JudulFoto;
    $photo->DeskripsiFoto = $request->DeskripsiFoto;
    $photo->AlbumID = $request->AlbumID;
    $photo->TanggalUnggah = $request->TanggalUnggah;
    
    // Periksa jika file_location ada dalam request
    if ($request->hasFile('LokasiFile')) {
        $file = $request->file('LokasiFile');
        $path = public_path('public/photo-images');
        $file_name =  date('Ymd') . '_' . $file->getClientOriginalName();
        $file->storeAs('photo-images', $file_name);
        $photo->LokasiFile = $file_name;
    }

    // Tidak perlu memperbarui tanggal pembuatan
    // Perbarui atribut 'userId' dengan ID pengguna yang sedang masuk
    $photo->UserID = auth()->user()->UserID;

    // Simpan perubahan pada foto
    $photo->save();

    // Redirect ke halaman foto-data dengan pesan sukses
    return redirect('/admin/foto')->with('success', 'Photo telah diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */


     public function destroy($FotoID)
    {
        Photo::destroy($FotoID);
        return redirect('/admin/foto')->with('success','Foto Berhasil Dihapus');
    }
    
    

}