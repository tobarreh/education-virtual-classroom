<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Article;
use App\Subject;
use App\Topic;
use App\Tag;

class ArticlesController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index(Request $request)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        if ($me->type == 'admin') {

            $articles = Article::search($request->title, $me->id)->orderBy('title', 'ASC')->paginate(10);
        } else {
            $articles = Article::articles_by_user($request->title, $me->id)->orderBy('title', 'ASC')->paginate(10);
        }
        
        return view("$me->type" . '.articles.index')->with('articles', $articles);
    }

    public function create()
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $subjects = Subject::orderBy('name', 'ASC')->pluck('name', 'id');
        $topics = Topic::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');

        return view("$me->type" . '.articles.create')
            ->with('subjects', $subjects)
            ->with('topics', $topics)
            ->with('tags', $tags);
    }

    public function store(Request $request)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $article = new Article($request->all());
        
        $article->user_id = $me->id;
        $article->save();  
        $article->tags()->sync($request->tags);

        flash('Se ha creado el articulo ' . $article->title . ' correctamente', 'info')  ;
        return redirect()->route('articles.index');
    }

    public function show($id)
    {
        $article = Article::find($id);
        $article->tags()->sync($article->tags);
        
        $article->seen = ++$article->seen;
        $article->save();
        
        return view('common.articles.show')->with('article', $article);
    }

    public function edit($id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $article = Article::find($id);

        $subjects = Subject::orderBy('name', 'ASC')->pluck('name', 'id');
        $topics = Topic::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');
        $article_tags = $article->tags->pluck('id')->toArray();

        return view("$me->type" . '.articles.edit')
            ->with('article', $article)
            ->with('subjects', $subjects)
            ->with('topics', $topics)
            ->with('tags', $tags)
            ->with('article_tags', $article_tags);
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();

        Flash('El articulo ' . $article->title . ' ha sido actualizado correctamente', 'info');
        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        Flash('El articulo ' . $article->title . ' ha sido eliminado correctamente', 'info');
        return redirect()->route("articles.index");
    }
}
