<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album;
use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    // Di method index GalleryController.php
    // Di method index GalleryController.php
public function index(){
    $photos = Photo::join('albums', 'albums.AlbumID', '=', 'photos.AlbumID')
    ->select('photos.*', 'albums.NamaAlbum') // Pilih kolom yang diperlukan
    ->withCount(['comments']) // Menghitung jumlah komentar untuk setiap foto
    ->get();

    return view('main.foto.index', compact('photos'));
}



//     public function detail($id)
// {
//     $photos = Photo::where('AlbumID', $id)->get();

//     return view('main.land.detailAlbum',compact(['photos']));
// }


public function detail($id)
{
    $photos = Photo::join('albums', 'albums.AlbumID', '=', 'photos.AlbumID')
        ->where('FotoID', $id)
        ->get();

    $like = Like::where('FotoID', $id)->count();
    $foto_id = $id;
    $comments = Comment::where('FotoID', $id)->get();

    return view('main.foto.detailFoto', compact(['photos', 'comments', 'foto_id', 'like']));
}

public function storeComment(Request $request, $id)
{
    $validatedData = $request->validate([
        'IsiKomentar' => 'required'
    ]);

    // Mendapatkan pengguna yang sedang login, jika ada
    if(Auth::check()) {
        $user = Auth::user();

        // Simpan komentar ke dalam database dengan UserID
        $comment = new Comment();
        $comment->FotoID = $id;
        $comment->IsiKomentar = $request->IsiKomentar;
        $comment->cmn_name = $user->username; // Gunakan nama pengguna yang sedang login
        $comment->UserID = $user->UserID; // Gunakan ID pengguna yang sedang login
        $comment->TanggalKomentar = now(); // Tanggal komentar diisi otomatis
        $comment->save();

        // Redirect ke halaman detail foto
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    } else {
        // Tindakan jika tidak ada pengguna yang sedang login
        return redirect()->back()->with('error', 'Silakan login terlebih dahulu untuk menambahkan komentar');
    }
}

   
    public function profile(){
        return view('admin.profile');
    }
    
}