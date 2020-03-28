<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
