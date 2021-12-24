<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantation extends Model
{
    protected $hidden = ['id', 'created_at', 'updated_at', 'deleted_at'];
    protected $visible  = ['code', 'date', 'latitude', 'longitude', 'lieu'];
    protected $fillable  = ['code', 'date', 'latitude', 'longitude', 'lieu'];

    public function speculations()
    {
        return $this->belongsToMany('App\Models\Speculation');
    }

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    public function member() 
    {
        return $this->belongsTo('App\Models\Member');
    }

}
