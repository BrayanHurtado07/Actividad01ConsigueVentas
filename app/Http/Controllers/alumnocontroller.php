<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;
use Egulias\EmailValidator\Result\Reason\UnclosedComment;

class alumnocontroller extends Controller
{
    public function getAlumno(){
        return response()->json(alumno::all(), 200);
    }

    public function getAlumnoxid($id){
        $alumno = alumno::find($id);
        if(is_null($alumno)){
            return response()->json(['Mensaje' => 'Alumno no Encontrado'], 404);
        }
        return response()->json($alumno::find($id), 200);
    }

    public function insertAlumno(Request $request){

        $messages = [
            'nom_alumno.required' => 'El nombre es obligatorio.',
            'ape_alumno.required' => 'El apellido es obligatorio.',
            'dni_alumno.required' => 'El dni es obligatorio.',
            'dni_alumno.digits_between' => 'El dni es de 8 dígitos.',
            'nom_alumno.string' => 'El campo nombre solo permite letras.',
            'ape_alumno.string' => 'El campo apellido solo permite letras.',
            'dni_alumno.integer' => 'El campo dni solo permite numeros.'
        ];
        $request->validate([
            'nom_alumno' => 'required|string|max:255',
            'ape_alumno' => 'required|string|max:255',
            'dni_alumno' => 'required|integer|digits_between: 7,8',
        ], $messages);

        $alumno = alumno::create($request->all());
        return response($alumno, 200);
    }

    public function updateAlumno(Request $request,$id){
        $alumno = alumno::find($id);
        if(is_null($alumno)){
            return response()->json(['Mensaje' => 'Alumno no encontrado'], 404);
        }
        $alumno->update($request->all());
        return response($alumno, 200);
    }

    public function deleteAlumno($id){
        $alumno = alumno::find($id);
        if(is_null($alumno)){
            return response()->json(['Mensaje' => 'Alumno no encontrado'], 404);
        }
        $alumno->delete();
        return response()->json(['Mensaje' => 'Alumno eliminado'], 200);
    }
}
