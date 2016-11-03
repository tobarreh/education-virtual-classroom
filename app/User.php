<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    protected $fillable = [
        'name', 'email', 'password', 'type', 'birth_date', 'cell_phone', 'city', 'about_me', 'twitter', 'facebook', 'linkedIn', 'youtube'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function scopeSearch($query, $name)
    {
        return $query
            ->whereIn('type', ['professor', 'student'])
            ->where('name', 'like', "%$name%");
    }

    public function scopeUser_type($query, $type)
    {
        return $query->where('type', 'like', "%$type%");
    }
}
