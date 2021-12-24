<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_piece extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];
    
    public function user() 
    {
        return $this->belongsTo('App\Model\User');
    }
}
