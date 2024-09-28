<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $table = 'users';
    protected $fillable = [
        'name_user',
        'email',
        'password',
        'phone',
        'address',
        'role_id',
    ];
    public function roles()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     */


    /**
     * The attributes that should be cast.
     *
     */

}
