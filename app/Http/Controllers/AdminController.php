<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AdminController extends Controller
{
    public function index(){
        return view ('admin.admin_login'); 
    }

    public function loginAdmin (Request $request){
        $dados = $request->all();
        // if(Auth::guard('admin')->attempt(['email' => $dados['email'], 'password' => $dados['password']])){
        //      return redirect()->route('admin.admin_dashboard');
        // }else{
        //     // return back()->with('error', 'email ou senha inválidos');
        //      dd($request['email'], $request['password']);
        // }
        // $dadinhos = $request->only('email', 'password'); 

        if (auth()->guard('admin')->attempt(['email' => $dados['email'], 'password' => $dados['password']])) {
            // dd('esse aí passou'); 
            return redirect()->route('dashboardAdmin');
        }else{
            return back()->withErrors(['email' => 'credenciais inválidas']); 
        }

        
        // if(Auth::attempt($dadinhos)){
        //     return redirect()->intended('admin.admin_dashboard');
        // }

        // dd($dadinhos);
    }
    public function dashboard(){
        return view('admin.admin_dashboard'); 
    }
}
