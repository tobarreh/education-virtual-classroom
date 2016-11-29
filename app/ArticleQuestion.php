<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public function answers()
    {
        return $this->hasMany('App\ArticleQuestionAnswer');
    }

    public function scopeQuestions_by_article($query, $id)
    {
        return $query
            ->select('aq.id', 'aq.content', 'aq.votes', 'aq.article_id', 'aq.user_id', 'aq.created_at', 'aq.updated_at', DB::raw('count(aqa.id) as n_answers'))
            ->from ('article_question as aq')
            ->leftjoin('article_question_answer as aqa', 'aq.id', '=', 'aqa.question_id')
            ->where('aq.article_id', $id)
            ->groupBy('aq.id', 'aq.content', 'aq.votes', 'aq.article_id', 'aq.user_id', 'aq.created_at', 'aq.updated_at')
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
