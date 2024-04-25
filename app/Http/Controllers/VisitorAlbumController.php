<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Comment;

use App\Models\Photo;

class VisitorAlbumController extends Controller
{
    public function album(Request $request){
        // dd($request);
        $album = Album::all();
        $photo = Photo::join('albums','albums.AlbumID', 'photos.AlbumID')
            ->where('photos.AlbumID')
            ->get();
        $Album_now = Album::where('AlbumID')->first();
        return view ('main.album.index', [
            'album'=>$album,
            // 'album_id'=>$id,
            'album_name'=>$Album_now,
            'photo' => $photo
        ]);
    }

//     public function showPhotos($id)
// {
//     $photos = Photo::where('AlbumID', $id)->get();
//     $album = Album::findOrFail($id);


//     return view('album.photos', [
//         'photos' => $photos,
//         'album' => $album
//     ]);
// }
public function detail($id)
{
    $photos = Photo::join('albums', 'albums.AlbumID', '=', 'photos.AlbumID')
                    ->where('photos.AlbumID', $id)
                    ->get(['photos.*', 'albums.NamaAlbum', 'albums.Deskripsi', 'albums.TanggalDibuat']);

    return view('main.album.detailAlbum', compact('photos'));
}


    
}