<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
    	'name', 'subject_id'
    ];

    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }

    public function scopeTopics_by_subject($query, $id)
    {
        return $query->where('subject_id', "$id");
    }
}
