<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ReportError;

class ReportErrorsController extends Controller
{
    public function store(Request $request)
    {
    	//TODO corregir auth (pasar al construct)
        $me = Auth::user();

    	$error = new ReportError($request->all());
        $error->user_id = $me->id;
        $error->save();

        flash('Tu error ha sido registrado correctamente!', 'info');
        return redirect()->route('home.index');
    }
}