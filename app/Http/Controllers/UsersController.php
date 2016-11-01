<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //TODO (cambiar a $me)
    protected $user_id;
    protected $user_type;

    public function __construct()
    {
        
    }

    //TODO (validacion de campos)
    public function index(Request $request)
    {
        //TODO corregir auth (pasar al construct)
        $this->user_id = Auth::user()->id;
        $this->user_type = Auth::user()->type;

        $users = User::search($request->name)->orderBy('name', 'ASC')->paginate(10);
    
        return view("$this->user_type" . '.users.index')->with('users', $users);
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
        
        $user = User::find($id);

        return view('common.users.show')
            ->with('me', $me)
            ->with('user', $user);
    }

    public function edit($id)
    {
        //TODO corregir auth (pasar al construct)
        $me = Auth::user();
        $user = User::find($id);
        

        return view('common.users.edit')
            ->with('me', $me)
            ->with('user', $user);   
    }

    public function update(Request $request, $id)
    {
        //TODO corregir auth (pasar al construct)
        $this->user_id = Auth::user()->id;

        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        if ($user->id == $this->user_id) {
            
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