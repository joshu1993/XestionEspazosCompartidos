<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\ImplicitRule;
use Validator;
use Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Sala;
use App\Models\Evento;
use App\Models\Image;
use App\Models\SalaRole;
use App\Models\Role;
use DB;


class SalasController extends Controller
{
    
    public function getList(Request $request) {

    	$section = 'salas';
        $id_auth_user = Auth::id();
        $auth_user = \App\Models\Sala::find($id_auth_user); 
    	return view('salas.index', compact('section','auth_user'));
    }

    public function getTableData($id_auth_user) {
        $data = array(
            'draw' => 1,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'data' => array()
        );
        
        $user = \App\Models\User::find($id_auth_user);
       
        if($user->role_id == 1){
            $dbData = \App\Models\Sala::all(); 
            $data['recordsTotal'] = $dbData->count();
    		$data['recordsFiltered'] = $dbData->count();  
                          
            foreach ($dbData as $sala) {
                array_push($data['data'], array(
                    'DT_RowId' =>$sala->id,
                    'nombre' => $sala->nombre,
                    'descripcion' => $sala->descripcion,
                    'metrosCuadrados' => $sala->metrosCuadrados,
                    'aforo'=> $sala->aforo,
                    'proyector'=> $sala->proyector,
                    'color'=> $sala->color,
                    'created_at'=>$sala->created_at,
                    'calendar' => '',             
                    'actions' => ''
                ));
            }
        }else{
            $dbsalaRol = \App\Models\SalaRole::where('role_id', $user->role_id)->get();
            foreach ($dbsalaRol as $salaRol) { 
                $dbData = \App\Models\Sala::where('id', $salaRol->sala_id )->get(); 
                $data['recordsTotal'] = $dbData->count();
                $data['recordsFiltered'] = $dbData->count();  
                            
                foreach ($dbData as $sala) {
                    array_push($data['data'], array(
                        'DT_RowId' =>$sala->id,
                        'nombre' => $sala->nombre,
                        'descripcion' => $sala->descripcion,
                        'metrosCuadrados' => $sala->metrosCuadrados,
                        'aforo'=> $sala->aforo,
                        'proyector'=> $sala->proyector,
                        'color'=> $sala->color,
                        'created_at'=>$sala->created_at,
                        'calendar' => '',             
                        'actions' => ''
                    ));
                }
            }
        }
           
        return Response::json($data); 

    }

    public function createSala(Request $request){
        $section = 'salas';
        $id_auth_user = Auth::id();
        $auth_user = \App\Models\User::find($id_auth_user);
        
        $roles=\App\Models\Role::where('id', 2)->orWhere('id',3)->get();
       
        
    	return view('salas.form', compact('section','auth_user','roles'));
    }

    public function createNewSala(Request $request){
        
        $validator = Validator::make($request->all(),[
                'nombre' => 'required',
                'descripcion'=>'nullable',
                'metrosCuadrados'=>'nullable',
                'aforo'=>'nullable',
                'proyector'=>'nullable',
                'color'=>'required',
                'sala_rol'=>'required'
                
        ]);

            if($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()]);
            }
            else
            {
                $sala=new \App\Models\Sala;
                $sala->nombre = $request->input('nombre');
                $sala->descripcion = $request->input('descripcion');
                $sala->metrosCuadrados = $request->input('metrosCuadrados');
                $sala->aforo = $request->input('aforo');
                $sala->proyector = $request->input('proyector');
                $sala->color = $request->input('color');

                $sala->save();
               
            }
            if($request->hasFile('images'))
            {
                $files= $request->file('images');
                foreach($files as $file){
                    $imageName= $file->getClientOriginalName();
                    $request['sala_id']=$sala->id;
                    $request['image']=$imageName;
                    $file->move('images/salas/',$imageName);
                    \App\Models\Image::create($request->all());
                }
            }
            foreach ($request->sala_rol as $sala_id){
                $sala->salaRoles()->attach($sala_id);
            }
         
        return response()->json(['error'=> array(), 'message' => __('validation.messages.createSuccess')]);
    
    }

    public function editSala($salaNombre){

        $sala = \App\Models\Sala::where('nombre',$salaNombre)->first();

        $sala_id= \App\Models\Sala::where('nombre',$salaNombre)->first()->id;
        
        $imagenes=\App\Models\Image::where('sala_id',$sala_id)->get();

        $roles=\App\Models\Role::where('id', 2)->orWhere('id',3)->get();

        $section = 'salas';
        $id_auth_user = Auth::id();
        $auth_user = \App\Models\User::find($id_auth_user);

        return view('salas.form', compact('sala','imagenes', 'roles','section','auth_user'));
   
    }
    
   

    public function updateSala(Request $request){
       

        $data = (null !== $request->all()) ? $request->all() : '';

        if ($data != '') {
    		
    		$validateOptions = array(
                
                'nombre' => 'required',
                'descripcion'=>'required',
                'metrosCuadrados'=>'nullable',
                'aforo'=>'nullable',
                'proyector'=>'nullable',
                'color'=>'required',
                'sala_rol'=>'required'
               
		    );

	    	$validator = Validator::make($data, $validateOptions);

	        if ($validator->passes()) {

                $sala = \App\Models\Sala::find($data['id']);
                $sala->nombre = $data['nombre'];
                $sala->descripcion = $data['descripcion'];
                $sala->metrosCuadrados= $data['metrosCuadrados'];
                $sala->aforo = $data['aforo'];
                $sala->proyector= $data['proyector'];
                $sala->color= $data['color'];

                $salaArray=[];
               
                foreach ($data['sala_rol'] as $sala_id){

                    $salaArray[]= $sala_id;

                } 

                $sala->salaRoles()->sync($salaArray);
                $sala->save();
            }
        
            if($request->hasFile('images')){
                $files= $request->file('images');
                foreach($files as $file){
                    $imageName= $file->getClientOriginalName();
                    $request['sala_id']=$data['id'];
                    $request['image']=$imageName;
                    $file->move('images/salas/',$imageName);
                    \App\Models\Image::create($request->all());
                }
            }

            return response()->json(['error'=> array(), 'message' => __('validation.messages.updateSuccess')]);
        }    
	    return response()->json(['error'=>$validator->errors()]);
         
    }
       



    public function eliminarSala(Request $request) {
        $id = (null !== $request->input('id')) ? $request->input('id') : '';
        
    
        if ($id > 0) {
            
            $images=\App\Models\Image::where('sala_id',$id)->get();
            
            foreach($images as $image){
                if (File::exists("images/salas/".$image->image)) {
                File::delete("images/salas/".$image->image);
            }
            }
            DB::table('images')->where('sala_id',$id)->delete();
            DB::table('sala_roles')->where('sala_id',$id)->delete();
            
            \App\Models\Sala::destroy($id);
                                
            return response()->json(['status'=> 'OK', 'message' => __('validation.messages.deleteSuccess')]);
        }
        return response()->json(['status'=> 'KO', 'message' => __('validation.messages.deleteError')]);            
        
    }

    //calendario sala

    public function getCalendarioSala($nombresala) {

        $sala = \App\Models\Sala::where('nombre',$nombresala)->first();
    
        $section = 'calendario';
        $id_auth_user = Auth::id();
        $auth_user = \App\Models\User::find($id_auth_user);
    
        $rol=$auth_user->role_id;
        if($rol == 1){

            $salas=\App\Models\Sala::select('id','nombre','color')->orderBy('nombre')->get();
        }
        else{

            $salas=\App\Models\Sala::select('id','nombre','color')->whereHas('salaRoles', function($q) use($rol) {
                $q->where('role_id', $rol);
            })->orderBy('nombre')->get();
        }

        return view('salas.calendario', compact('sala', 'section','auth_user','salas'));
    }

    public function getEventosSala($sala) {
            
        $data = [];
        
            $sala_id=\App\Models\sala::where('nombre',$sala)->first(); 
            $sal=$sala_id->id;
        
            $dbEventos = \App\Models\Evento::where('sala_id',$sal)->get(); 
                        
                foreach ($dbEventos as $evento) { 
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
                
        return response()->json($data);
    }
        

}
