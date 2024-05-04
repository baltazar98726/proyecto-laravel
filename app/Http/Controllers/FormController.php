<?php

namespace App\Http\Controllers;

use App\Models\form;
use Illuminate\Http\Request;


class FormController extends Controller
{
    public function index(Request $request){
        return view('form.login');
    }

    public function index2(Request $request){
        return view('form.register');
    }

    public function guardar(Request $request){
        $request ->validate([
            'nombre'=> 'required',
            'email'=> 'required | email | unique:forms',
            'pass'=> 'required | confirmed',
            'pass_confirmation'=> 'required',

        ]);

        $form = new Form();
        $form -> nombre = $request -> nombre;
        $form -> email = $request -> email;
        $form -> pass = $request -> pass;
        $form -> pass_confirmation = $request -> pass_confirmation;

        $form -> save ();
        return back('')->with('success','¡Formulario validado con exito');

    }
}
