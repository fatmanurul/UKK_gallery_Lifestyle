<?php

namespace App\Models;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Photo extends Model
{
    use HasFactory;
    protected $table = 'photos';
    protected $primaryKey = 'FotoID';

    protected $guarded = ['FotoID'];


    protected $fillable = ['likes']; // Tambahkan 'likes' ke fillable

    public function comments()
{
    return $this->hasMany(Comment::class, 'FotoID');
}

public function likes()
{
    return $this->hasMany(Like::class, 'FotoID');
}

public function user()
{
    return $this->belongsTo(User::class, 'UserID');
}
}