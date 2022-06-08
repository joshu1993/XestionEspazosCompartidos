<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\ImplicitRule;
use Validator;
use Response;
use Illuminate\Support\Facades\Schema;

//para enviar correo

use App\Mail\NewUserXec;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{

    public function getCurrentUser(){
        $id_auth_user = Auth::id();
        $auth_user = \App\Models\User::find($id_auth_user); 
        return $auth_user;
    }
    
    public function getList(Request $request)
    {
       

        $section = 'users';
        $id_auth_user = Auth::id();
        $auth_user = \App\Models\User::find($id_auth_user); 
    	return view('users.index', compact('section','auth_user'));
        
    }


  public function getTableData($id_auth_user) {
    $data = array(
        'draw' => 1,
        'recordsTotal' => 0,
        'recordsFiltered' => 0,
        'data' => array()
    );
    
    $user = \App\Models\User::find($id_auth_user);

        $dbData = \App\Models\User::all(); 
            $data['recordsTotal'] = $dbData->count();
            $data['recordsFiltered'] = $dbData->count();  
                      
             foreach ($dbData as $user) {
                array_push($data['data'], array(
                    'DT_RowId' =>$user->id,
                    'name' => $user->name,
                    'dni' => $user->dni,
                    'nombreRol' => $user->role->nombreRol,
                    'email' => $user->email,
                    'actions' => ''
                 ));
            }
            
    return \Response::json($data); 
}

public function createUser(Request $request){
    $section = 'users';
    $id_auth_user = Auth::id();
    $auth_user = \App\Models\User::find($id_auth_user);
    $roles = \App\Models\Role::all();
    return view('users.form', compact('section', 'roles', 'auth_user'));
}
  
 
    public function createNewUser(Request $request){

        $data = $request->all();
        $info = (null !== $request->input('data')) ? $request->input('data') : '';
            
        parse_str($info, $data);

         $validateOptions = array(
            'name' => 'required|min:3|max:50',
            'password' => 'required',
            'dni' => 'required|min:9|max:9',
            'email' => 'required|email',
                    
        );

        if (trim($data['password']) != '') {
                $validateOptions = array_merge($validateOptions, array(
                    'password' => 'required|confirmed|min:6'
                ));
        }

        $validator = Validator::make($data, $validateOptions);

        if ($validator->passes()) {
            \App\Models\User::create([
                'name' => $data['name'],
                'dni' => $data['dni'],
                'role_id' => $data['role'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
                            
            ]);

            $email=$data['email'];

            Mail::to($email)->send(new NewUserXec($data));
            return response()->json(['error'=> array(), 'message' => __('validation.messages.createSuccess')]);
        }
        return response()->json(['error'=>$validator->errors()]);
    }

    
    public function editUsuario(User $user) {
    	$section = 'users';
        $id_auth_user = Auth::id();
        $auth_user = \App\Models\User::find($id_auth_user);
    	$roles = \App\Models\Role::all();
        
    	return view('users.form', compact('user', 'section', 'roles', 'auth_user'));
    }
 

    public function updateUsuario(Request $request) {
    	$info = (null !== $request->input('data')) ? $request->input('data') : '';
        
    	if ($info != '') {
    		parse_str($info, $data);

    		$validateOptions = array(
                    'name' => 'required|min:3|max:50',
                    'email' => 'required|email'
                    
		);

    		if (trim($data['password']) != '') {
                    $validateOptions = array_merge($validateOptions, array(
                        'password' => 'required|confirmed|min:6'
                    ));
    		}

	    	$validator = Validator::make($data, $validateOptions);
           
	        if ($validator->passes()) {

                    $user = \App\Models\User::find($data['id']);
                    $user->name = $data['name'];
                    $user->role_id = $data['role'];
                    $user->email = $data['email'];
                    if (trim($data['password']) != '') {
                        $user->password = Hash::make($data['password']);
                    }
                    $user->save();

                    return response()->json(['error'=> array(), 'message' => __('validation.messages.updateSuccess')]);
	        }
	    	return response()->json(['error'=>$validator->errors()]);
    	}
    } 

    public function eliminarUsuario(Request $request) {
    	$id = (null !== $request->input('id')) ? $request->input('id') : '';

        if ($id > 0) {
           
            \App\Models\User::destroy($id);
                                           
            return response()->json(['status'=> 'OK', 'message' => __('validation.messages.deleteSuccess')]);
        }
        return response()->json(['status'=> 'KO', 'message' => __('validation.messages.deleteError')]);            
        
    }

}
