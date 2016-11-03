<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
 	protected $fillable = ['title', 'content', 'topic_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function topic()
    {
    	return $this->belongsTo('App\Topic');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function scopeSearch($query, $title, $id)
    {
        return $query
            ->where('title', 'like', "%$title%");
    }

    public function scopeArticles_by_user($query, $title, $id)
    {
        return $query
            ->where('user_id', $id)
            ->where('title', 'like', "%$title%");
    }
}
