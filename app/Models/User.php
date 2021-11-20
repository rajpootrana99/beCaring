<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'image',
        'parent_id',
        'address',
        'address_latitude',
        'address_longitude',
    ];

    public function getPermissionAttribute()
    {
        return $this->getAllPermissions();
    }

    protected $appends = [
        'permission'
    ];

    protected $with =[
        'permissions',
        'roles'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function nurse(){
        return $this->hasOne(Nurse::class);
    }

    public function token(){
        return $this->hasOne(Token::class);
    }

    public function medications(){
        return $this->hasMany(Medication::class);
    }

    public function trainings(){
        return $this->hasMany(Training::class);
    }
}
