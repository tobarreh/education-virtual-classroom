<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = "topics";
    protected $fillable = ['name', 'subject_id'];

    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function scopeSearch($query, $name)
    {
        return $query
            ->where('name', 'like', "%$name%");
    }
}
