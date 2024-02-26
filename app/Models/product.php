<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['nm_product', 'file'];

    protected $dates = ['created_at', 'updated_at'];

    public  function knowladge()
    {
        return  $this->hasOne(knowladge::class);
    }
    public  function Konten()
    {
        return  $this->hasOne(Konten::class);
    }
}
