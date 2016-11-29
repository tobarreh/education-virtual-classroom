<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\ArticleQuestion;

class ArticleQuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $question = new ArticleQuestion($request->all());

        $question->user_id = $me->id;
        $question->article_id = $id;
        $question->save();  

        flash('Tu pregunta ha sido realizada correctamente', 'info')  ;
        return redirect()->route('articles.show', $id);
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
        $question = ArticleQuestion::find($id);
        $article_id = $question->article_id;

        $question->delete();

        Flash('Tu pregunta ha sido eliminada correctamente', 'info');
        return redirect()->route('articles.show', $article_id);        
    }

    public function vote($id, $vote)
    {
        $question = ArticleQuestion::find($id);

        if ($vote == 0) {

            $question->votes = --$question->votes;
        
        } else {
           
            $question->votes = ++$question->votes;
        }          
        
        $question->save();

        Flash('Tu voto ha sido realizado correctamente', 'info');
        return redirect()->route('articles.show', $question->article_id);
    }
}