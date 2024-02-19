<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $table =  'web';
    protected $primaryKey = 'web_id';
    protected $fillable = [
        'product_id', 'sub', 'deskripsi', 'gambar' // Add other fields as needed
    ];

    // You can define relationships, scopes, or other model methods here
}
