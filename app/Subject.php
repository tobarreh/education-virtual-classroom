<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    protected $fillable = ['name', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function topics()
    {
    	return $this->hasMany('App\Topic');
    }

    public function scopeSearch($query, $name)
    {
    	return $query->where('name', 'like', "%$name%");
    }

    public function scopeArticles_by_subject($query, $id)
    {
        return $query
            ->join('topics', 'subjects.id', '=', 'topics.subject_id')
            ->join('articles', 'topics.id', '=', 'articles.topic_id')
            ->where('subjects.id', $id);
    }
}
