<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loadProfilePage(){
        $user_data = User::where('id', '=', Auth::user()->id)->get();
        $gender_data = Gender::all();
        // $role_data = Role::where('id', '=', $user_data->role_id)->get();

        // dd($user_data);
        // dd($user_data->role);

        if(Auth::user()->role->role_name == 'admin'){
            return view('admin.profile', [
                'user_data' => $user_data,
                'gender_data' => $gender_data
            ]);
        }else{
            return view('user.profile', [
                'user_data' => $user_data,
                'gender_data' => $gender_data
            ]);
        }
    }

    public function toSaved(){
        return view('user.saved');
    }

    public function updateProfile(Request $request){
        $user_data = User::where('id', '=', Auth::user()->id)->first();

        // dd($user_data);
        $request->validate([
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'gender' => 'required',
            'display_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'old_password' => 'required|min:5',
            'new_password' => 'required|min:5'
        ]);

        if($request->display_picture != ''){        
            $path = 'public/';
  
            //code for remove old file
            if($user_data->display_picture_link != ''  && $user_data->display_picture_link != null){
                $file_old = $path.$user_data->display_picture_link;
                unlink($file_old);
            }
  
            //upload new file
            $imageName = time().'.'.$request->display_picture_link->getClientOriginalExtension();
            $path = $request->display_picture_link->move('images/', $imageName);
        }
        
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }
        
        if(strcmp($request->old_password, $request->new_password) == 0){
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user_data->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'display_picture_link' => $path,
            'password' => bcrypt($request->new_password),
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);

        return redirect('/saved');
    }

    public function loadAccountPage(){
        $user_data = User::all();
        
        return view('admin.acc_maintenance', [
            'user_data' => $user_data
        ]);

    }

    public function deleteAccount($id){
        //Delete Account
        $user_data = User::where('id', '=', $id);
        $user_data->delete();
        return redirect('/account-maintenance');
    }  

    public function loadUpdateRolePage($id){
       $role_data = Role::all();
       $user_data = User::where('id', '=', $id)->first();
    //    dd($user_data);
        
        return view('admin.update_role', [
            'role_data' => $role_data,
            'user_data' => $user_data
        ]);

    }

    public function updateRole(Request $request, $id){
        User::find($id);

        $user_data = User::all()->where('user_id', '=', $id);



    }


}
