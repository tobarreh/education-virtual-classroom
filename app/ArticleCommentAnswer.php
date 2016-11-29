<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCommentAnswer extends Model
{
    protected $table = "article_comment_answer";
 	protected $fillable = ['content', 'votes', 'comment_id', 'user_id'];

    public function comment()
    {
    	return $this->belongsTo('App\ArticleComment');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function scopeAnswers_by_article($query, $id)
    {
        return $query
            ->select('article_comment_answer.*')
            ->join('article_comment', 'article_comment_answer.comment_id', '=', 'article_comment.id')
            ->where('article_comment.article_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
