<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['name'];

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public function scopeSearch($query, $name)
    {
    	return $query->where('name', 'like', "%$name%");
    }
}
