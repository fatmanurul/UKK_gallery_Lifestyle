<?php

namespace App\Models;
use App\Models\User;
use App\Models\Photo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likephotos';
    protected $primaryKey = 'LikeID';

    protected $fillable = ['FotoID', 'UserID', 'TanggalLike'];
    
}