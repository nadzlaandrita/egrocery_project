<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }  
      
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if($request->remember){
            Cookie::queue('email_cookie', $email);
            Cookie::queue('password_cookie', $password, 2);
        }

        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        
        if (Auth::attempt($credentials, true)){

            $request->session()->put("mySession", $credentials); 

            // dd($role_checked);
            
            if(Auth::user()->role->role_name == 'admin'){
                return redirect('/home');
            }else{
                return redirect('/home');
            }
            
        }

        return "fail";

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function registerPage()
    {
        $gender_data = Gender::all();
        $role_data = Role::all();

        // dd($gender_data);
        return view('register', [
            'gender_data' => $gender_data,
            'role_data' => $role_data
        ]);
    }
      
    public function register(Request $request)
    {  
        var_dump($request->all());

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $role = $request->role;
        $gender = $request->gender;
        $display_picture = $request->display_picture;
        $password = $request->password;
        $confirm_password = $request->confirm_password;

        $this->validate($request, [
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'gender' => 'required',
            'display_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5'
        ]);

        $role_data = Role::where('role_name', '=', $request->role)->first();
        $gender_data = Gender::where('gender_desc', '=', $request->gender)->first();

        $imageName = time().'.'.$request->display_picture->getClientOriginalExtension();

        $path = $request->display_picture->move('images/', $imageName);

        User::insert([

            'role_id' => $role_data->id,
            'gender_id' => $gender_data->id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'display_picture_link' => $path,
            'password' => bcrypt($password),
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]); 
           
        $credentials = [

            "email" => $email,
            "password" => $password
        ];

        // Login
        return redirect("/login");
    }

}

