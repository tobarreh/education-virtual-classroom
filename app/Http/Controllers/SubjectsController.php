<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Grade;
use App\Matter;
use App\Subject;

class SubjectsController extends Controller
{
        public function __construct()
    {
        
    }

    public function index(Request $request)
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

    	$subjects = Subject::orderBy('id', 'ASC')->paginate(10);

        foreach ($subjects as $subject) {
           $subject->n_topics = count($subject->topics);
        }

        return view("$me->type" . '.subjects.index')->with('subjects', $subjects);
    }

    public function create()
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

     	$matters = Matter::orderBy('name', 'ASC')->pluck('name', 'id');
        $grades = Grade::orderBy('name', 'ASC')->pluck('name', 'id');

        return view("$me->type" . '.subjects.create')
        	->with('matters', $matters)
            ->with('grades', $grades);
    }

    public function store(Request $request)
    {
        $subject = new Subject($request->all());

        $matter = Matter::find($request->matter_id);
        $grade = Grade::find($request->grade_id);
        $subject->name = "$matter->name" . ' de ' . "$grade->name";

        $subject->save();
        
        flash('Se ha registrado la asignatura ' . $subject->name . ' correctamente!', 'info');
        return redirect()->route('subjects.index');
    }

    public function show($id)
    {
        $subjects = Subject::orderBy('name', 'ASC')->paginate(10);    
        
        return view('common.subjects.show')->with('subjects', $subjects);
    }

    public function edit($id)
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

	 	$subject = Subject::find($id);

        return view("$me->type" . '.subjects.edit')->with('subject', $subject);
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
