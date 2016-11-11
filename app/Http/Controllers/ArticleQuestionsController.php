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
        
        Carbon::setLocale('es');
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
        //
    }
}
