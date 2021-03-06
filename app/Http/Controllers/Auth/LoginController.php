<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Evento;
use App\Models\Salas;
use Validator;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {

        $section = 'home';
        $eventos=\App\Models\Evento::all();
        $salas=\App\Models\Sala::select('id','nombre','color')->orderBy('nombre')->get();
        //return view('home');
        return view(' home', compact('section','eventos','salas'));
    }

    public function getAllEventos(Request $request){
        
        $data = [];
        
    
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
                
        //return Response::json($data); 
        return response()->json($data);
    }

    public function getAllCalendarioSala($nombresala) {

        //dd($nombresala);
    
        $sala = \App\Models\Sala::where('nombre',$nombresala)->first();
        //$sala = \App\Models\Sala::find($nombresala);
        //$sala = json_decode($sala,true);
        //dd($sala);
    
       // dd($sala);
        $section = 'calendar';
       
    
            $salas=\App\Models\Sala::select('id','nombre','color')->orderBy('nombre')->get();
        
       
        return view('allCalendarioSala', compact('sala', 'section','salas'));
    }
    

    public function getAllEventosSala($sala) {
        
        $data = [];
        
            $sala_id=\App\Models\sala::where('nombre',$sala)->first(); 
           // $sala_id=\App\Models\sala::find($sala); 
           // console.log($sala_id);
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
                
        //return Response::json($eventos); 
     
        return response()->json($data);
    }
/*
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->with('success','Signed in');
        }
  
        return redirect("login")->with('error','Email o contrase??a son erroneos');
    }
    */

    public function customLogin(Request $request)
    {
        $this->validateLogin($request, [
            'email' => 'required|max:255|email',
            'password' => 'required|confirmed',
        ]);

        
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->customAttemptLogin($request)) {
            $request->session()->pull('url.intended');
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }    

    
    

    protected function customAttemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->customCredentials($request), $request->filled('remember')
        );
    }


    protected function customCredentials(Request $request)
    {
        
        return $request->only(
            'email', 'password', 'password_confirmation', 'token', 'role_id'
        );
        
       
        

    }    
    
    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    
    protected function sendFailedLoginResponse(Request $request)
    {
        //$errors = [$this->username() =>[trans('auth.failed')]] ;
       //$errors = [ 'message' => __('auth.failed')];

        //dd($errors);
       

        // Load user from database
        $user = User::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        /*
        if ($user && \Hash::check($request->password, $user->password) && $user->active != 1) {
            $errors = [$this->username() =>[trans('auth.notactivated')]];
        }
        */
        
        if ($user && \Hash::check($request->password, $user->password) && $user->active != 1) {
            return redirect('login')->with('error','Email no esta registrado');
        }

        /*
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
            //return response()->json(['error'=> array(), 'message' => __('auth.failed')]);
        }
        */
        /*
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
        */
        return redirect('login')->with('error','Email o contrase??a son erroneos');
       // return redirect('login').showNotify('danger', 'Email o contrase??a son erroneos');
        
        //appMethods.showNotify('danger', response.data.message);
           
    }

}
