<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
            'code',
            'cooperative',
            'name',
            'prenom',
            'date_naissance',
            'lieu',
            'situation_mat',
            'civilite',
            'police_a',
            'type_p',
            'numero_p',
            'tel',
            'mobile',
            'adresse',
            'email',
            'interlocuteur',
            'tel_interlocuteur',
            'password',
            'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */


    public function cooperatives() 
    {
        return $this->hasMany('App\Models\Cooperative');
    }

    public function type_pieces() 
    {
        return $this->hasMany('App\Models\Type_piece');
    }

    public function plantations() 
    {
        return $this->hasMany('App\Models\Plantation');
    }

    public function speculations(){
        return $this->hasMany(Speculation::class);
    }

}
