<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Grade;
use App\Matter;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }

    //TODO (validacion de campos)
    public function index(Request $request)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $users = User::search($request->name)->orderBy('name', 'ASC')->paginate(10);    
        
        return view("$me->type" . '.users.index')->with('users', $users);
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
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $grades = Grade::orderBy('name', 'ASC')->paginate(10);
        $matters = Matter::orderBy('name', 'ASC')->paginate(10);

        $user = User::find($id);
        
        return view('common.users.show')
            ->with('grades', $grades)
            ->with('matters', $matters)
            ->with('me', $me)
            ->with('user', $user);
    }

    public function edit($id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $user = User::find($id);

        $grades = Grade::orderBy('name', 'ASC')->paginate(10);
        $matters = Matter::orderBy('name', 'ASC')->paginate(10);
        
        return view('common.users.edit')
            ->with('me', $me)
            ->with('user', $user)
            ->with('grades', $grades)
            ->with('matters', $matters);
    }

    public function update(Request $request, $id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();

        $user = User::find($id);
        $user->fill($request->all());

        if (!empty($request->file('image'))) {
            
            $file = $request->file('image');       
            $name = $user->name . '_' . time() . '.' . $file->getClientOriginalExtension();

            $path = public_path() . '/images/profile/user';
            $file->move($path, $name);

            $user->image = 'images/profile/user/' . $name;
        }

        if (empty($request->birth_date)) {
            $user->birth_date = null;
        }

        $user->save();

        if ($user->id == $me->id) {
            
            flash('Tu perfil ha sido actualizado correctamente', 'info');
            return redirect()->route('users.show', $user->id);
        
        } else {
            
            Flash('El usuario ' . $user->name . ' ha sido actualizado correctamente', 'info');
            return redirect()->route('users.show', $user->id);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        flash('El usuario ' . $user->name . ' ha sido eliminado correctamente', 'info');
        return redirect()->route('users.index');
    }
}
