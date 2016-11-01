<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoriesController extends Controller
{
    //TODO (cambiar a $me)
    protected $user_id;
    protected $user_type;

    public function __construct()
    {
    
    }

    public function index(Request $request)
    {
        //TODO corregir auth (pasar al construct)
        $this->user_type = \Auth::user()->type;
        
        $categories = Category::search($request->name)->orderBy('name', 'ASC')->paginate(10);
        
        $categories->each(function($category){
           $category->n_subjects = count($category->subjects);
        });

        return view("$this->user_type.categories.index")->with('categories', $categories);        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
