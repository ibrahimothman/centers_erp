<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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

    // Automatically create empty center once new user has been created
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user){
//            $center = $user->center()->create([
//                'name' => 'center name'
//            ]);

//            $user->update([
//                'center_id' => 2
//            ]);
        });
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
