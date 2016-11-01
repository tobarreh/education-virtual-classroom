<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
    
    }

    public function index(Request $request)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();
        
        $categories = Category::search($request->name)->orderBy('name', 'ASC')->paginate(10);
        
        $categories->each(function($category){
           $category->n_subjects = count($category->subjects);
        });

        return view("$me->type" . '.categories.index')->with('categories', $categories);        
    }

    public function create()
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        return view("$me->type" . '.categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category($request->all());
        $category->save();

        flash('Se ha registrado la categoria ' . $category->name . ' correctamente!', 'info');
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();
 
        $category = Category::find($id);
        
        return view("$me->type" . '.categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all());
        $category->save();

        Flash('La categoria ' . $category->name . ' ha sido actualizada correctamente', 'info');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Flash('La categoria ' . $category->name . ' ha sido eliminado correctamente');
        return redirect()->route('categories.index');
    }
}