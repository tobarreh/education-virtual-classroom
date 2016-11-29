<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Grade;
use App\Matter;
use App\Topic;

class GradesController extends Controller
{
    public function index(Request $request)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $grades = Grade::search($request->name)->orderBy('name', 'ASC')->paginate(10);

        foreach ($grades as $grade) {
            $grade->n_subjects = count($grade->subjects);
        }

        return view("$me->type" . '.grades.index')->with('grades', $grades);
    }

    public function create()
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        return view("$me->type" . '.grades.create');
    }

    public function store(Request $request)
    {
        $grade = new Grade($request->all());
        $grade->save();
        
        flash('Se ha registrado el grade ' . $grade->name . ' correctamente!', 'info');
        return redirect()->route('grades.index');
    }

    public function show($id)
    {
        $grades = Grade::orderBy('name', 'ASC')->paginate(10);
        $matters = Matter::orderBy('name', 'ASC')->paginate(10);
        $grade = Grade::find($id);
        $topics = Topic::topics_by_grade($id)->orderBy('name', 'ASC')->paginate(10);
        
        return view('common.grades.show')
            ->with('grades', $grades)
            ->with('matters', $matters)
            ->with('grade', $grade)
            ->with('topics', $topics);
    }

    public function edit($id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();
 
        $grade = Grade::find($id);
        
        return view("$me->type" . '.grades.edit')->with('grade', $grade);
    }

    public function update(Request $request, $id)
    {
        $grade = Grade::find($id);
        $grade->fill($request->all());
        $grade->save();

        Flash('El grado ' . $grade->name . ' ha sido actualizada correctamente', 'info');
        return redirect()->route('grades.index');
    }

    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();

        Flash('El grado ' . $grade->name . ' ha sido eliminado correctamente');
        return redirect()->route('grades.index');
    }
}
