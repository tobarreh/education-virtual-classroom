<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Grade;
use App\Matter;
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

        $topics = Topic::search($request->name)->orderBy('id', 'ASC')->paginate(10);    

        foreach ($topics as $topic) {
           $topic->n_articles = count($topic->articles);
        }
        
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

        flash('Se ha registrado el tema ' . $topic->name . ' correctamente!', 'info');
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
