<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class knowladge extends Model
{
    use HasFactory;

    protected $table = "knowladge";
    
    protected $fillable = ['product_id','deskripsi'];
    
    public function product(){
        return $this->belongsTo(product::class);
    }
}
