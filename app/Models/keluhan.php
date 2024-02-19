<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluhan extends Model
{
    protected $table = "keluhans";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama', 'id_produk'
    ];

    public function produk()
    {
        return $this->belongsTo(product::class);
    }
}
