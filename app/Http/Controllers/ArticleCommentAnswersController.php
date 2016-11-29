<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ArticleComment;
use App\ArticleCommentAnswer;

class ArticleCommentAnswersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $comment = ArticleComment::find($id);
        $answer = new ArticleCommentAnswer($request->all());

        $answer->user_id = $me->id;
        $answer->comment_id = $id;
        $answer->save();

        flash('Tu respuesta ha sido realizada correctamente', 'info');
        return redirect()->route('articles.show', $comment->article_id);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $answer = ArticleCommentAnswer::find($id);
        $article_id = $answer->comment->article_id;

        $answer->delete();

        Flash('Tu respuesta ha sido eliminada correctamente', 'info');
        return redirect()->route('articles.show', $article_id);
    }

    public function vote($question_id, $comment_id, $vote)
    {
        $answer = ArticleCommentAnswer::find($comment_id);

        if ($vote == 0) {

            $answer->votes = --$answer->votes;
        
        } else {
           
            $answer->votes = ++$answer->votes;
        }          
        
        $answer->save();

        Flash('Tu voto ha sido realizado correctamente', 'info');
        return redirect()->route('articles.show', $answer->comment->article_id);
    }
}