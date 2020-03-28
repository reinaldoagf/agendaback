<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contact;
class ContactController extends Controller
{
    //
	public function all(){
        try {
            $response = [
                'message'=> 'Lista de contactos',
                'data' => Contact::all(),
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de obtener los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
    public function get($id){
        try {            
            $contact = Contact::find($id);
            if(is_null($contact)){
                return response()->json([
                    'message'=>'Contacto no existente',
                    'data'=>$contact
                ],404);
            }
            $response = [
                'message'=> 'Contacto encontrado',
                'data' => $contact,
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de obtener los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:45',
            'last_name'             => 'string|max:45',
            'email'                 => 'required|email|max:45|unique:users,email',
            'address'               => 'string|max:45',
            'phone'                 => 'required|string|max:45',
        ],[
            'name.required'                  => 'El nombre es requerido',
            'name.string'                    => 'El nombre debe ser una cadena de caracteres',
            'name.max'                       => 'El nombre debe contener como máximo 45 caracteres',
            'last_name.string'               => 'El apellido debe ser una cadena de caracteres',
            'last_name.max'                  => 'El apellido debe contener como máximo 45 caracteres',
            'email.required'                 => 'El email es requerido',
            'email.email'                    => 'Formato de email incorrecto',
            'email.max'                      => 'El email debe contener como máximo 45 caracteres',
            'email.unique'                   => 'Ya existe un usuario con este email',
            'address.string'                 => 'La dirección debe ser una cadena de caracteres',
            'address.max'                    => 'La dirección debe contener como máximo 45 caracteres',
            'phone.required'                 => 'El telefono es requerido',
            'phone.string'                   => 'El telefono debe ser una cadena de caracteres',
            'phone.max'                      => 'El telefono debe contener como máximo 45 caracteres'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try{
            $contact= new Contact();
            $contact->name=$request->get('name');
            $contact->last_name=$request->get('last_name');
            $contact->address=$request->get('address');
            $contact->phone=$request->get('phone');
            $contact->email=$request->get('email');
            // $contact->photo="";
            $contact->save();
            $response = [
                'message'=> 'Contacto registrado satisfactoriamente',
                'data' => $contact,
            ];          
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:45',
            'last_name'             => 'required|string|max:45',
            'email'                 => 'required|email|max:45|unique:contacts,email,'.$id,
            'address'               => 'string|max:45',
            'phone'                 => 'required|string|max:45',
        ],[
            'name.required'                  => 'El nombre es requerido',
            'name.string'                    => 'El nombre debe ser una cadena de caracteres',
            'name.max'                       => 'El nombre debe contener como máximo 45 caracteres',
            'last_name.required'             => 'El apellido es requerido',
            'last_name.string'               => 'El apellido debe ser una cadena de caracteres',
            'last_name.max'                  => 'El apellido debe contener como máximo 45 caracteres',
            'email.required'                 => 'El email es requerido',
            'email.email'                    => 'Formato de email incorrecto',
            'email.max'                      => 'El email debe contener como máximo 45 caracteres',
            'email.unique'                   => 'Ya existe un usuario con este email',
            'address.string'                 => 'La dirección debe ser una cadena de caracteres',
            'address.max'                    => 'La dirección debe contener como máximo 45 caracteres',
            'phone.required'                 => 'El telefono es requerido',
            'phone.string'                   => 'El telefono debe ser una cadena de caracteres',
            'phone.max'                      => 'El telefono debe contener como máximo 45 caracteres'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $contact= Contact::find($id);
            if(is_null($contact)){
                return response()->json(['message'=>'Contacto no existente'],404);
            }
            $contact->fill($request->all());
            $response = [
                'message'=> 'Contacto actualizado satisfactoriamente',
                'data' => $contact,
            ];
            $contact->update();
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
    public function delete($id){
        try {
            $contact = Contact::find($id);
            if(is_null($contact)){
                return response()->json(['message'=>'Contacto no existente'],404);
            }
            $response = [
                'message'=> 'Contacto eliminado satisfactoriamente',
                'data' => $contact,
            ];
            $contact->delete();
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
}
