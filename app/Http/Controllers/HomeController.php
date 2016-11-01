<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    public $user_type;

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        //TODO corregir auth (pasar al construct)            
        if (isset(\Auth::user()->type)) {
            $this->user_type = \Auth::user()->type;
        }

        if ($this->user_type == 'admin') {
        
            $n_students = User::user_type('student')->count();
            $n_professors = User::user_type('professor')->count();
            //$n_articles = Article::orderBy('id', 'ASC')->count();

            return view('admin.index')
                ->with('n_students', $n_students)
                ->with('n_professors', $n_professors);
                //->with('n_articles', $n_articles);
        
        } elseif ($this->user_type == 'professor') {
            
            return view('professor.index');

        } else {
            
            return view('home');

        }
    }
}