<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function scopeSearch($query, $name)
    {
    	return $query->where('name', 'like', "%$name%");
    }
}
