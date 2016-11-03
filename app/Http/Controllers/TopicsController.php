<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subject;
use App\Topic;

class TopicsController extends Controller
{
    public function __construct()
    {
        
    }

    //TODO (validacion de campos)
    public function index(Request $request)
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $topics = Topic::search($request->name)->orderBy('name', 'ASC')->paginate(10);    
        
        return view("$me->type" . '.topics.index')->with('topics', $topics);
    }

    public function create()
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $subjects = Subject::orderBy('name', 'ASC')->pluck('name', 'id');

        return view("$me->type" . '.topics.create')->with('subjects', $subjects);  
    }

    public function store(Request $request)
    {
	 	$topic = new Topic($request->all());
        $topic->save();

        $subject = Subject::find($topic->subject_id);

        flash('Se ha registrado la categoria ' . $topic->name . ' correctamente!', 'info');
        return redirect()->route('topics.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

	 	$topic = Topic::find($id);
        $subjects = Subject::orderBy('name', 'ASC')->pluck('name', 'id');

        return view("$me->type" . '.topics.edit')
            ->with('topic', $topic)
            ->with('subjects', $subjects);
    }

    public function update(Request $request, $id)
    {
    	$topic = Topic::find($id);
        $topic->fill($request->all());    
        $topic->save();

        Flash('El tema ' . $topic->name . ' ha sido actualizado correctamente', 'info');
        return redirect()->route('topics.index');
    }

    public function destroy($id)
    {
    	$topic = Topic::find($id);
        $topic->delete();

        Flash('El tema ' . $topic->name . ' ha sido eliminado correctamente', 'info');
        return redirect()->route('topics.index');
    }
}
