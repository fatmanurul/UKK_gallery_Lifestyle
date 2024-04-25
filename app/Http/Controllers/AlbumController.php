<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = Album::get(); 
        // dd(Auth::user()->UserID);
        return view('admin.album.index', ['album' => $album]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.album.create');
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
        $message = [
            // 'unique' => 'Nama sudah dipakai!',
            'required' => 'Silahkan isi kolom ini!'
        ];
        $validatedData = $request->validate([
            'NamaAlbum' => 'required|max:255', 
            'Deskripsi' => 'required|max:255',
            'TanggalDibuat' => 'required'   
        ],$message
    );

        $validatedData['UserID'] = auth::user()->UserID;
// dd($validatedData);

        // insert data ke database
        Album::create($validatedData);

        return redirect('/admin/album')->with('success', 'Album baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        // dd($album);
        return view('admin.album.edit',[
            'album' => $album
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        // dd($category);
        $message = [
            'required' => 'Silahkan isi kolom ini!',
        ];
        $validatedData = $request->validate([
            'NamaAlbum' => 'required|max:255',
            'Deskripsi'=>'required',
            'TanggalDibuat'=>'required'
        ],$message
     );

         $validatedData['UserID'] = auth::user()->UserID;

         Album::where('AlbumID', $album->AlbumID)
                ->update($validatedData); 

        return redirect('/admin/album')->with('success', 'Album telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        Album::destroy($album->AlbumID);
        return redirect('/admin/album')->with('success','Album Berhasil Dihapus');
    }
}
