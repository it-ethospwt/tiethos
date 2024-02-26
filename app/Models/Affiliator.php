<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliator extends Model
{
    protected $table =  'affiliator';
    protected $primaryKey = 'id';
    protected $fillable = [
        'produk_id', 'nama', 'tim', 'jekel', 'gambar', 'akun', 'usia', 'alamat', 'cp', 'kategori', 'gmv', 'komisi', 'agency', 'deskripsi', 'like', 'followers', 'viewers'
    ];

    // You can define relationships, scopes, or other model methods here
}
