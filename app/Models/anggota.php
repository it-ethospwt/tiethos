<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected  $fillable = ['tim_id','user_id'];
    
    public function  User(){
        return  $this->belongsTo(User::class,'user_id');
    }
    
    public function tim(){
        return  $this->belongsTo(tim::class,'tim_id');        
    }
}
