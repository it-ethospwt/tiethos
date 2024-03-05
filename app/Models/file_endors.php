<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_endors extends Model
{
    use HasFactory;

    protected $table = 'file_endors'; 

    protected $fillable = ['endors_id','file'];

    public function endors(){
        return $this->belongsTo(endors::class);
    }
}
