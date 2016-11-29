<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleQuestionAnswer extends Model
{
    protected $table = "article_question_answer";
 	protected $fillable = ['content', 'votes', 'question_id', 'user_id'];

    public function question()
    {
    	return $this->belongsTo('App\ArticleQuestion');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function scopeAnswers_by_article($query, $id)
    {
        return $query
            ->select('article_question_answer.*')
            ->join('article_question', 'article_question_answer.question_id', '=', 'article_question.id')
            ->where('article_question.article_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}