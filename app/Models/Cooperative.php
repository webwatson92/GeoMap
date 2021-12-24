<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    use HasFactory;
    protected $fillable = ['intitule', 'responsable', 'contact'];

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    public function members() 
    {
        return $this->hasMany('App\Models\Member');
    }
    
}
