<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleQuestion extends Model
{
    protected $table = "article_question";
 	protected $fillable = ['content', 'votes', 'article_id', 'user_id'];

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function scopeQuestions_by_article($query, $id)
    {
        return $query
            ->where('article_id', $id);
    }
}
