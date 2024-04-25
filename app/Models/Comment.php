<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'photocomments';
    protected $primaryKey = 'KomentarID';
    protected $fillable = ['FotoID', 'IsiKomentar', 'cmn_name', 'UserID', 'TanggalKomentar'];


    protected $guarded = ['KomentarID'];

    protected $dates = ['TanggalKomentar'];

}