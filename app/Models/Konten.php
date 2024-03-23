<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $table =  'contents';
    protected $primaryKey = 'content_id';
    protected $fillable = [
        'product_id', 'title', 'konten', 'gambar', 'video'
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
