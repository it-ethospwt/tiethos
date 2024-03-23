<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wa extends Model
{
    protected $table =  'wa';
    protected $primaryKey = 'wa_id';
    protected $fillable = [
        'product_id', 'sub', 'deskripsi', 'gambar' // Add other fields as needed
    ];
}
