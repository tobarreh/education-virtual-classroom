<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ArticleQuestion;
use App\ArticleQuestionAnswer;

class ArticleQuestionAnswersController extends Controller
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

        $question = ArticleQuestion::find($id);
        $answer = new ArticleQuestionAnswer($request->all());

        $answer->user_id = $me->id;
        $answer->question_id = $id;
        $answer->save();

        flash('Tu respuesta ha sido realizada correctamente', 'info');
        return redirect()->route('articles.show', $question->article_id);
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
        $answer = ArticleQuestionAnswer::find($id);
        $article_id = $answer->question->article_id;

        $answer->delete();

        Flash('Tu respuesta ha sido eliminada correctamente', 'info');
        return redirect()->route('articles.show', $article_id);
    }

    public function vote($question_id, $answer_id, $vote)
    {
        $answer = ArticleQuestionAnswer::find($answer_id);

        if ($vote == 0) {

            $answer->votes = --$answer->votes;
        
        } else {
           
            $answer->votes = ++$answer->votes;
        }          
        
        $answer->save();

        Flash('Tu voto ha sido realizado correctamente', 'info');
        return redirect()->route('articles.show', $answer->question->article_id);
    }
}