<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
 	protected $fillable = ['title', 'tool', 'content', 'topic_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function topic()
    {
    	return $this->belongsTo('App\Topic');
    }

    public function tools()
    {
        return $this->hasMany('App\Tool');
    }    

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function aticleQuestions()
    {
        return $this->hasMany('App\ArticleQuestion');
    }

    public function aticleComments()
    {
        return $this->hasMany('App\ArticleComment');
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
