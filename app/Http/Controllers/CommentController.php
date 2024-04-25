<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class CommentController extends Controller
{
    public function index(Comment $comment)
    {
        $comments = Comment::join('photos','photos.FotoID', 'photocomments.FotoID')
                            ->orderBy('photocomments.TanggalKomentar', 'desc') 
                            ->get();
                            
        return view('admin.comments.index',[
        'comments' => $comments
        ]);

    }
  
    public function store(Request $request, $FotoID)
    {

        $messages = [
            'required' => 'Silahkan isi kolom ini!',
        ];

        $request->validate([
            'IsiKomentar' => 'required|max:600',
            'cmn_name' => 'required|max:255',
        ], $messages);

        $FotoID = Photo::where('FotoID', $FotoID)->first();
        
        $comments = new Comment;
        //  dd($findArticle);
        $comments-> FotoID = $FotoID->FotoID; 
        $comments-> cmn_name = $request->cmn_name;

        $comments-> IsiKomentar = $request->IsiKomentar;

        $comments->save();

        return redirect('/foto/' .$FotoID)->with('success', 'Komen telah diperbarui!');
    }
}