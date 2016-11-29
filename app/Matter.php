<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $table = "matters";
    protected $fillable = ['name', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public function scopeSearch($query, $name)
    {
    	return $query->where('name', 'like', "%$name%");
    }
}
