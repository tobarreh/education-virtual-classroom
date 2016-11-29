<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Grade;
use App\Category;
use App\Matter;
use App\Article;

class HomeController extends Controller
{
    public $user_type;

    public function __construct()
    {
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

            } elseif ($me->type == 'student') {
                
                $grades = Grade::orderBy('name', 'ASC')->paginate(10);
                $categories = Category::orderBy('id', 'ASC')->paginate(10);
                $matters = Matter::orderBy('name', 'ASC')->paginate(10);

                return view('common.index')
                    ->with('grades', $grades)
                    ->with('categories', $categories)
                    ->with('matters', $matters);
            }
        } else {

            $categories = Category::orderBy('id', 'ASC')->paginate(10);
            $grades = Grade::orderBy('name', 'ASC')->paginate(10);   
            $matters = Matter::orderBy('name', 'ASC')->paginate(10);

            return view('common.index')
                ->with('grades', $grades)
                ->with('categories', $categories)
                ->with('matters', $matters);
        }
    }
}