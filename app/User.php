<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'is_admin', 'point', 'words'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin'          => 'boolean'
    ];

    public function scopeisAdmin($query)
    {
        return $query->where('is_admin', 1);
    }

    public function scopeisUser($query)
    {
        return $query->where('is_admin', 0);
    }

    public function histories()
    {
        return $this->hasMany('App\History', 'user_id', 'id');
    }
}
