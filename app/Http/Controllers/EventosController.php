<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\ImplicitRule;
use Validator;
use Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Sala;
use App\Models\Role;
use App\Models\Evento;

use Carbon\Carbon; 


class EventosController extends Controller
{

    public function getEventos()
    {
        $section = 'eventos';
        $id_auth_user = Auth::id();
        $auth_user = \App\Models\User::find($id_auth_user); //cojo el nombre de usuario que hace la reserva
      
        $eventos=\App\Models\Evento::all();
       
        $rol=$auth_user->role_id;

        if($rol == 1){

            $salas=\App\Models\Sala::all();
        }
        else{

            $salas=\App\Models\Sala::select('id','nombre')->whereHas('salaRoles', function($q) use($rol) {
                $q->where('role_id', $rol);
            })->get();
        }
        
        return view('eventos.index', compact('section', 'salas', 'auth_user','eventos'));

    } 

    public function getTableEventos($id_auth_user) {
        $data = array(
            'draw' => 1,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'data' => array()
        );

        $user = \App\Models\User::find($id_auth_user);
        $hoy = Carbon::today(); //Aquí se obtiene la fecha de hoy

        if($user->role_id == 1){
            $dbData = \App\Models\Evento::whereDate('start','>=', $hoy)->orderBy('start','ASC')->get(); 
            $data['recordsTotal'] = $dbData->count();
    		$data['recordsFiltered'] = $dbData->count();  
                          
            foreach ($dbData as $evento) {
                array_push($data['data'], array(
                    'DT_RowId' =>$evento->id,
                    'userDni' => $evento->user->dni,
                    'userName'=>$evento->user->name,
                    'start' => $evento->start,
                    'end' => $evento->end,
                    'userEmail'=> $evento->user->email,
                    'salaNombre'=> $evento->sala->nombre
                    
                   
                ));
            }
        }else{

            $dbData = \App\Models\Evento::whereDate('start', '>=', $hoy)->where('user_id',$id_auth_user)->orderBy('start','ASC')->get(); 
            $data['recordsTotal'] = $dbData->count();
    		$data['recordsFiltered'] = $dbData->count();  
                          
            foreach ($dbData as $evento) {
                array_push($data['data'], array(
                    'DT_RowId' =>$evento->id,
                    'userDni' => $evento->user->dni,
                    'start' => $evento->start,
                    'end' => $evento->end,
                    'userEmail'=> $evento->user->email,
                    'salaNombre'=> $evento->sala->nombre
                    
                   
                ));
            }

        }

            return Response::json($data); 
        }
  
}
