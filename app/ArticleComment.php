<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ArticleComment extends Model
{
    protected $table = "article_comment";
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
        return $this->hasMany('App\ArticleCommentsAnswer');
    }

    public function scopeComments_by_article($query, $id)
    {
        return $query
            ->select('ac.id', 'ac.content', 'ac.votes', 'ac.article_id', 'ac.user_id', 'ac.created_at', 'ac.updated_at', DB::raw('count(aca.id) as n_answers'))
            ->from ('article_comment as ac')
            ->leftjoin('article_comment_answer as aca', 'ac.id', '=', 'aca.comment_id')
            ->where('ac.article_id', $id)
            ->groupBy('ac.id', 'ac.content', 'ac.votes', 'ac.article_id', 'ac.user_id', 'ac.created_at', 'ac.updated_at')
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
