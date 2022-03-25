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
use App\Models\SalaRole;
use App\Models\Evento;

use Carbon\Carbon; 

use App\Providers\RouteServiceProvider;

//para enviar correo

use App\Mail\XecMailable;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectTo = RouteServiceProvider::HOME;
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $section = 'home';
        $eventos=\App\Models\Evento::all();
        $salas=\App\Models\Sala::all();
        //return view('home');
        return view(' home', compact('section','eventos','salas'));
    }
    
    public function getCalendario()
    {
        $section = 'dashboard';
        $id_auth_user = Auth::id();
        $auth_user = \App\Models\User::find($id_auth_user); //cojo el nombre de usuario que hace la reserva
      
        $eventos=\App\Models\Evento::all();
       
        $rol=$auth_user->role_id;

        if($rol == 1){

            $salas=\App\Models\Sala::select('id','nombre','color')->orderBy('nombre')->get();
        }
        else{

            $salas=\App\Models\Sala::select('id','nombre','color')->whereHas('salaRoles', function($q) use($rol) {
                $q->where('role_id', $rol);
            })->orderBy('nombre')->get();
        }
        return view('dashboard', compact('section', 'salas', 'auth_user','eventos'));

    }  
    
    public function getEventos($id_auth_user){
        
        $data = [];

        $user = \App\Models\User::find($id_auth_user);

        if($user->role_id == 1){
    
            $dbData = \App\Models\Evento::all(); 
                          
            foreach ($dbData as $evento) {
                $dato=[];
                $dato['id'] =$evento->id;
                $dato['title'] = $evento->title;
                $dato['start'] = $evento->start;
                $dato['end'] = $evento->end;
                $dato['nombreUser']= $evento->user->name;
                $dato['nombreSala']= $evento->sala->nombre;

                $dato['color']= $evento->sala->color;

                $dato['descripcion']= $evento->descripcion;
                $data[]=$dato;
                    
            }
            
        }
        else{
            
            $dbeventoRol = \App\Models\SalaRole::where('role_id', $user->role_id)->get();
            foreach ($dbeventoRol as $eventoRol) { 
                $dbData = \App\Models\Evento::where('sala_id', $eventoRol->sala_id )->get(); 

                //$dbData = \App\Models\Evento::all(); 
                   
                foreach ($dbData as $evento) {
                    $dato=[];
                    $dato['id'] =$evento->id;
                    $dato['title'] = $evento->title;
                    $dato['start'] = $evento->start;
                    $dato['end'] = $evento->end;
                    $dato['nombreUser']= $evento->user->name;
                    $dato['nombreSala']= $evento->sala->nombre;

                    $dato['color']= $evento->sala->color;

                    $dato['descripcion']= $evento->descripcion;
                    $data[]=$dato;
                        
                }
            }
            
        }
      
        return response()->json($data);
    }

   
    public function validarFecha($horaInicio, $horaFin, $sala){
        
        $evento= \App\Models\Evento::where('sala_id',$sala)->where(function($query)  use($horaInicio, $horaFin){
                    $query->whereBetween('start',[$horaInicio,$horaFin])
                            ->orWhereBetween('end',[$horaInicio,$horaFin]);
                })->first();

        //dd($evento) //mira lo que hace la consulta
        
        return $evento==null ?true :false;
    }
    /*
    public function validarUser($horaInicio, $horaFin, $user){
        
        $evento= \App\Models\Evento::where('user_id',$user)->where(function($query)  use($horaInicio, $horaFin){
                    $query->whereBetween('start',[$horaInicio,$horaFin])
                            ->orWhereBetween('end',[$horaInicio,$horaFin]);
                })->first();

        //dd($evento) //mira lo que hace la consulta
        
        return $evento==null ?true :false;
    }
    */

   
    public function createNewEvento(Request $request){
       
        //$id=Auth::user()->id; 
       // $data['user_id'] = Auth::user()->id; 

        //$email= Auth::user()->email; //funciona bien, poner cuando se suba proyecto

        $email= "joshua93.futbol@gmail.com"; //prueba mientras no se suba

        //dd($email);
       $data = request()->all();
       $data['user_id'] = Auth::user()->id;

       $hoy = Carbon::today();
        $datos= array(
                
            'title' => 'required',
            'start'=>'required|before_or_equal:end',
            'end'=>'required',
            'sala_id' => 'required',
            'descripcion' => 'nullable'
        );
       
        $validator = Validator::make($data, $datos);
       
        if ($validator->passes()) {
            if($data["start"]<= $hoy){
                return response()->json(['error' => array([1]),'message' => __('validation.messages.dayFailed')]);
            }
            else{
                if($this->validarFecha($data["start"],$data["end"],$data["sala_id"])){
                    \App\Models\Evento::create([
                        'title' => $data['title'],
                        'start' => $data['start'],
                        'end' => $data['end'],
                        'user_id' => $data['user_id'],
                        'sala_id' => $data['sala_id'],
                        'descripcion' => $data['descripcion'],
                    
                        
                    ]);
                    $data['user_nombre'] = Auth::user()->name;
                    $data['sala_nombre'] = \App\Models\Sala::where('id',$data['sala_id'])->first()->nombre;
                    //dd($data);
                    Mail::to($email)->send(new XecMailable($data));
                    return response()->json(['error'=> array(), 'message' => __('validation.messages.createSuccess')]);
                }else{
                    return response()->json(['error' => array([1]),'message' => __('validation.messages.createFailed')]);
                }

            }
            
        }
        
        return response()->json(['error'=>$validator->errors()]);
    }

    public function showEvento($id) {
     
        $evento =  \App\Models\Evento::find($id);
        $json_evento = json_decode($evento,true); 

        $nombreUser = \App\Models\User::find($evento['user_id']);

        $nombreUser = json_decode($nombreUser,true);

        $nombreSala = \App\Models\Sala::find($evento['sala_id']);

        $nombreSala = json_decode($nombreSala,true);

        $json_evento["nombreUser"] = ((isset($nombreUser['name']))&&($nombreUser['name'] != '') ? (trim($nombreUser['name'])) : '');
        $json_evento["correoUser"] = ((isset($nombreUser['email']))&&($nombreUser['email'] != '') ? (trim($nombreUser['email'])) : '');

        $json_evento["nombreSala"] = ((isset($nombreSala['nombre']))&&($nombreSala['nombre'] != '') ? $nombreSala['nombre'] : '');
       
                  
       return response()->json($json_evento); 
  
    }
   
    public function updateEvento(Request $request){ 

        $data = (null !== $request->all()) ? $request->all() : '';
        //dd($info);

         
    	if ($data != '') {
    		//parse_str($info, $data);
            //$email= Auth::user()->email;

            $email= "joshua93.futbol@gmail.com";

    		$validateOptions = array(
                'title' => 'required',
                'start'=>'required',
                'end'=>'required',
               // 'user_id' => 'required',
               //'sala_id' => 'required',
                'descripcion' => 'nullable'
		    );

    	
	    	$validator = Validator::make($data, $validateOptions);
             $data['user_id'] = Auth::user()->id;

	        if ($validator->passes()) {
                if($data["start"]<= $hoy){
                    return response()->json(['error' => array([1]),'message' => __('validation.messages.dayFailed')]);
                }
                else{

                    if($this->validarFecha($data["start"],$data["end"],$data["sala_id"])){
                        $evento = \App\Models\Evento::find($data['id']);
                        $evento->title = $data['title'];
                        $evento->start = $data['start'];
                        $evento->end = $data['end'];
                        $evento->user_id = $data['user_id'];
                        $evento->sala_id = $data['sala_id'];
                        $evento->descripcion = $data['descripcion'];
                        $evento->save();
    
                        $evento['user_nombre'] = Auth::user()->name;
                        $evento['user_correo'] = Auth::user()->email;
                        $data['sala_nombre'] = \App\Models\Sala::where('id',$evento['sala_id'])->first()->nombre;
                        //dd($data);
    
                        Mail::to($email)->send(new XecMailable($evento));
                        return response()->json(['error' => array(), 'message' => __('validation.messages.updateSuccess')]);
                    }else{
                        return response()->json(['error' => array([1]),'message' => __('validation.messages.createFailed')]);
                    }

                }
                
                    
	        }
	    	return response()->json(['error'=>$validator->errors()]);
    	}
    }

    
    public function eliminarEvento(Request $request) {
    	$id = (null !== $request->input('id')) ? $request->input('id') : '';

        if ($id > 0) {
            //Schema::disableForeignKeyConstraints();
            \App\Models\Evento::destroy($id);
            //Schema::enableForeignKeyConstraints();                                
            return response()->json(['status'=> 'OK', 'message' => __('validation.messages.deleteSuccess')]);
        }
        return response()->json(['status'=> 'KO', 'message' => __('validation.messages.deleteError')]); 
    }





}
