<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory , Notifiable;

    protected $fillable=['first_name','last_name','mobile_number','email','age','city','gender','password'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function rent_books()
    {
        return $this->hasMany(Book::class,'taken_by_user','id');
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
}
