<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = "topics";
    protected $fillable = ['name', 'subject_id'];

    public function matter()
    {
    	return $this->belongsTo('App\Matter');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function scopeSearch($query, $name)
    {
        return $query
            ->where('name', 'like', "%$name%");
    }

    public function scopeTopics_by_grade($query, $id)
    {
        return $query
            ->select('topics.*')
            ->join('subjects', 'topics.subject_id', '=', 'subjects.id')
            ->join('grades', 'subjects.grade_id', '=', 'grades.id')
            ->where('grades.id', $id);
    }

    public function scopeTopics_by_matter($query, $id)
    {
        return $query
            ->select('topics.*')
            ->join('subjects', 'topics.subject_id', '=', 'subjects.id')
            ->join('matters', 'subjects.matter_id', '=', 'matters.id')
            ->where('matters.id', $id);
    }
}
