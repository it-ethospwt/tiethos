<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileKol extends Model
{
    protected $table =  'filekol';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kol_id', 'gambar', 'video'
    ];
}
