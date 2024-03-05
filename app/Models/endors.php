<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endors extends Model
{
    use HasFactory;
    
    protected $table = 'endors';

    protected $fillable = [
        'product_id',
        'nm_endorse',
        'usia',
        'jns_kelamin',
        'alamat',
        'kontak_person',
        'kategori',
        'spesifikasi_akun',
        'link_akun',
        'sosial_media',
        'viewer',
        'like',
        'follower',
        'rate_card',
        'engagement_rate',
        'owning',
        'foto',
        'deskripsi',
        'file_gambar',
        'file_video',
    ];

    public  function product(){
        return $this->belongsTo(product::class);
    }

    public function file_endors(){
        return $this->hasMany(file_endors::class);
    }
    
    public  function file_video_endors(){
        return  $this->hasMany(file_video_endors::class);
    }
}



