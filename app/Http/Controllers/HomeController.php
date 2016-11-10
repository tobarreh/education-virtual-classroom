<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Category;
use App\Subject;
use App\Article;

class HomeController extends Controller
{
    public $user_type;

    public function __construct()
    {
        $this->middleware('auth');

        Carbon::setLocale('es');
    }

    public function index()
    {
        //TODO corregir auth (pasar al construct)            
        if (isset(\Auth::user()->id)) {
            $me = \Auth::user();
        
            if ($me->type == 'admin') {
        
                $n_students = User::user_type('student')->count();
                $n_professors = User::user_type('professor')->count();
                $n_articles = Article::orderBy('id', 'ASC')->count();

                return view('admin.index')
                    ->with('n_students', $n_students)
                    ->with('n_professors', $n_professors)
                    ->with('n_articles', $n_articles);
            
            } elseif ($me->type == 'professor') {
                
                $articles = Article::orderBy('id', 'DESC')->paginate(10);

                return view('professor.index')->with('articles', $articles); 

            } else {
                
                $categories = Category::orderBy('id', 'ASC')->paginate(10);
                $subjects = Subject::orderBy('name', 'ASC')->paginate(10);

                return view('student.index')
                    ->with('categories', $categories)
                    ->with('subjects', $subjects);
            }
        }
    }
}