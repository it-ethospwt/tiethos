<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tim extends Model
{  
    use HasFactory;

    protected $table = "tim"; 

    protected  $fillable = ['nama_tim','users_id'];

    public  function User(){
        return  $this->belongsTo(User::class,'users_id');
    }
    
    public function anggota(){
        return  $this->hasMany(anggota::class);
    }
}
