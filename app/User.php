<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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

    public function getPelanggan(){
        if($this->role == 1){
            return $this->hasOne('App\Pelanggan','id_user');
        }
        return null;
    }

    public function getDriver(){
        if($this->role == 2){
            return $this->hasOne('App\Driver','id_user');
        }
        return null;
    }

    public function getStatus(){
        $stat = "tidak ada status";
        if($this->status == 1){
            $stat = "aktif";
        } else {

        }
        return $stat;
    }

    public function getRole(){
        $text = "";
        if($this->role == 1){
            $text = "Pelanggan";
        } else if($this->role == 2){
            $text = "Driver";
        }
        return $text;
    }
}
