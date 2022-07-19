<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'hrmlmsusers';
    protected $fillable = [
        'name',
        'nip',
        //'email',
        'password',
    ];

    public function role(){
        // return $this->belongsToMany(Role::class);
        return $this->belongsToMany('App\Models\Role');
        //return $this->hasManyThrough('App\Models\Role');
        // return $this->hasMany('App\Models\Role');
    }

    public function role_user(){
        return $this->hasMany(RoleUser::class);
    }

    public function unitkerja(){
        return $this->belongsTo('App\Models\UnitKerja');
    }

  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

}