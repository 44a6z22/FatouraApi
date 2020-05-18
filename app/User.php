<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function Clients()
    {
        return $this->hasMany('App\Client');
    }

    public function societe()
    {
        return $this->hasMany('App\Societe');
    }
    public function factures()
    {
        return $this->hasMany('App\Facture');
    }
    public function comptesBancaires()
    {
        return $this->hasMany('App\Compte_bancaire');
    }
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function parameteres()
    {
        return $this->hasMany('App\Parameter');
    }
    public function devises()
    {
        return $this->hasMany('App\Devis');
    }

    public function acomptes()
    {
        return $this->hasMany(FactureAcompte::class);
    }

    public function mot_cles()
    {
        return $this->hasMany(MotCle::class);
    }
    public function type_article()
    {
        return $this->hasMany(Type_article::class);
    }


    public function verifyPassword($password, $password1)
    {
        return ($password === $password1) ? true : false;
    }

    public function markDeleted()
    {
        $this->is_deleted = 1;
        return $this->save();
    }
    public function updatePassword(Request $request)
    {
        $this->password = bcrypt($request->newPassword);
        $this->save();
    }
}
