<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['nm_product', 'gmr_product', 'dec_product'];

    protected $dates = ['created_at', 'updated_at'];

    public function keluhan()
    {
        return $this->hasMany(keluhan::class);
    }
}
