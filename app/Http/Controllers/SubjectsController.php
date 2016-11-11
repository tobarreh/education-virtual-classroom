<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subject;
use App\Category;
use App\Topic;


class SubjectsController extends Controller
{
    public function __construct()
    {
        
    }

    //TODO (validacion de campos)
    public function index(Request $request)
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

    	$subjects = Subject::search($request->name)->orderBy('name', 'ASC')->paginate(10);

        $subjects->each(function($subject){
            $subject->n_articles = Subject::articles_by_subject($subject->id)->count();
        });

        return view("$me->type" . '.subjects.index')->with('subjects', $subjects);    
    }

    public function create()
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

     	$categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
     	
        return view("$me->type" . '.subjects.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $subject = new Subject($request->all());

        //Save image locally
        $file = $request->file('image');
        
        $name = $subject->name . '_' . time() . '.' . $file->getClientOriginalExtension();
        $subject->image = $name;
        
        $path = public_path() . '/images/subjects';
        $file->move($path, $name);

        $subject->save();
        
        flash('Se ha registrado la materia ' . $subject->name . ' correctamente!', 'info');
        return redirect()->route('subjects.index');
    }

    public function show($id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $subjects = Subject::orderBy('name', 'ASC')->paginate(10);
        $subject = Subject::find($id);
        
        return view('common.subjects.show')
            ->with('subjects', $subjects)
            ->with('subject', $subject);
    }

    public function edit($id)
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

	 	$subject = Subject::find($id);
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        return view("$me->type" . '.subjects.edit')
            ->with('subject', $subject)
            ->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
    	$subject = Subject::find($id);

        $subject->name = $request->name;
        $subject->category_id = $request->category_id;

        if (!empty($request->file('image'))) {
            
            $file = $request->file('image');       
            $name = $subject->name . '_' . time() . '.' . $file->getClientOriginalExtension();

            $path = public_path() . '/images/subjects';
            $file->move($path, $name);

            $subject->image = $name;
        }

        $subject->save();

        Flash('La materia ' . $subject->name . ' ha sido actualizada correctamente', 'info');
        return redirect()->route('subjects.index');

    }

    public function destroy($id)
    {
    	$subject = Subject::find($id);
        $subject->delete();

        Flash('La materia ' . $subject->name . ' ha sido eliminada correctamente', 'info');
        return redirect()->route("subjects.index");
    }
}
