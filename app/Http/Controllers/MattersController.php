<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Grade;
use App\Matter;
use App\Category;
use App\Topic;


class MattersController extends Controller
{
    public function __construct()
    {
        
    }

    //TODO (validacion de campos)
    public function index(Request $request)
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

    	$matters = Matter::search($request->name)->orderBy('name', 'ASC')->paginate(10);

        foreach ($matters as $matter) {
            $matter->n_subjects = count($matter->subjects);
        }

        return view("$me->type" . '.matters.index')->with('matters', $matters);    
    }

    public function create()
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

     	$categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
     	
        return view("$me->type" . '.matters.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $matter = new Matter($request->all());

        //Save image locally
        $file = $request->file('image');
        
        $name = $matter->name . '_' . time() . '.' . $file->getClientOriginalExtension();
        $matter->image = $name;
        
        $path = public_path() . '/images/matters';
        $file->move($path, $name);

        $matter->save();
        
        flash('Se ha registrado la materia ' . $matter->name . ' correctamente!', 'info');
        return redirect()->route('matters.index');
    }

    public function show($id)
    {
        $grades = Grade::orderBy('name', 'ASC')->paginate(10);
        $matters = Matter::orderBy('name', 'ASC')->paginate(10);
        $matter = Matter::find($id);
        $topics = Topic::topics_by_matter($id)->orderBy('name', 'ASC')->paginate(10);
        
        return view('common.matters.show')
            ->with('grades', $grades)
            ->with('matters', $matters)
            ->with('matter', $matter)
            ->with('topics', $topics);
    }

    public function edit($id)
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

	 	$matter = Matter::find($id);
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        return view("$me->type" . '.matters.edit')
            ->with('matter', $matter)
            ->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
    	$matter = Matter::find($id);

        $matter->name = $request->name;
        $matter->category_id = $request->category_id;

        if (!empty($request->file('image'))) {
            
            $file = $request->file('image');       
            $name = $matter->name . '_' . time() . '.' . $file->getClientOriginalExtension();

            $path = public_path() . '/images/matters';
            $file->move($path, $name);

            $matter->image = $name;
        }

        $matter->save();

        Flash('La materia ' . $matter->name . ' ha sido actualizada correctamente', 'info');
        return redirect()->route('matters.index');

    }

    public function destroy($id)
    {
    	$matter = Matter::find($id);
        $matter->delete();

        Flash('La materia ' . $matter->name . ' ha sido eliminada correctamente', 'info');
        return redirect()->route("matters.index");
    }
}