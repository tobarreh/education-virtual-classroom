<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    protected $fillable = ['color', 'name', 'grade_id', 'matter_id'];

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function matter()
    {
        return $this->belongsTo('App\Matter');
    }

    public function topics()
    {
    	return $this->hasMany('App\Topic');
    }

    public function scopeSearch($query, $name)
    {
    	return $query->where('name', 'like', "%$name%");
    }
}