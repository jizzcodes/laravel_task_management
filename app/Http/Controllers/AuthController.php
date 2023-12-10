<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{


    public function index()
    
    {

        $tasks = Task::all();
        $categories = Category::all();

     return view('admin.index',compact('tasks','categories'));
    }



    public function login()
    {
        return view('auth.login');
    }  
      

    public function Loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('index')->with('welcome','loged in ');
             
        }
        return redirect()->route('login')->with('error','Invalid Credentials');
        
    }



    public function registration()
    {
        return view('auth.registration');
    }
      

    public function Register(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        // dd($data);
        $check = $this->create($data);
         
        return back()->with('success','Successfully Registered');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
      

  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }
}