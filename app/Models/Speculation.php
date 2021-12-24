<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speculation extends Model
{
    protected $fillable = ['nom'];
    
    use HasFactory;

     
    //une spéculation appartient à plusieurs plantation
    public function plantations(){
        return $this->belongsToMany(Plantation::class);
    }

    public function user(){
        return $this->belongs(User::class);
    }
}


