<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tag;

class TagsController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $tags = Tag::search($request->name)->orderBy('name', 'ASC')->paginate(10);

        return view("$me->type" .  '.tags.index')->with('tags', $tags);
    }

    public function create()
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        return view("$me->type" . '.tags.create');
    }

    public function store(Request $request)
    {
        $tag = new Tag($request->all());
        $tag->save();

        flash('Se ha registrado el tag ' . $tag->name . ' correctamente!', 'info');
        return redirect()->route('tags.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $tag = Tag::find($id);

        return view("$me->type" . '.tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->fill($request->all());    
        $tag->save();

        Flash('El tag ' . $tag->name . ' ha sido actualizado correctamente', 'info');
        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        Flash('El tag ' . $tag->name . ' ha sido eliminado correctamente', 'info');
        return redirect()->route('tags.index');
    }
}
