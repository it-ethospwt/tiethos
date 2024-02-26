<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kol extends Model
{
    protected $table =  'kols';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'tanggal_tayang', 'owning', 'rate_card', 'transfer', 'resi', 'ekspedisi', 'id_produk', 'user', 'gambar', 'video' // Add other fields as needed
    ];
}
