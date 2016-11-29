<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ArticleComment;


class ArticleCommentsController extends Controller
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

        $comment = new ArticleComment($request->all());

        $comment->user_id = $me->id;
        $comment->article_id = $id;
        $comment->save();  

        flash('Tu comentario ha sido realizado correctamente', 'info')  ;
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
        $comment = ArticleComment::find($id);
        $article_id = $comment->article_id;

        $comment->delete();

        Flash('Tu comentario ha sido eliminado correctamente', 'info');
        return redirect()->route('articles.show', $article_id);        
    }

    public function vote($id, $vote)
    {
        $comment = ArticleComment::find($id);

        if ($vote == 0) {

            $comment->votes = --$comment->votes;
        
        } else {
           
            $comment->votes = ++$comment->votes;
        }          
        
        $comment->save();

        Flash('Tu voto ha sido realizado correctamente', 'info');
        return redirect()->route('articles.show', $comment->article_id);
    }
}
