<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile_view',compact('profileData'));
    }

    public function AdminProfileStore(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
    
        if (!$data) {
            return redirect()->back()->with('error', 'User not found');
        }
    
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
    
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }
    
        
            $data->save(); 

            $notificaion = array (
                'message'=>'Admin profile updated successfully',
                'alert-type' => 'success'
            );


            return redirect()->back()->with($notificaion);
    
        
    }

    public function AdminChangePassword (){


        $id = Auth::user()->id;
        $profileData = User::find($id);


        return  view('admin.admin_change_password',compact('profileData'));
    }



    public function AdminUpdatePassword ( Request $request) {

$request->validate([
    'old_password' => 'required',
    'new_password' => 'required|confirmed'
]);

//match old password

if(!Hash::check($request->old_password,auth::user()->password)){

$notificaion = array(
    'message' => 'Old password incorrect!',
    'alert-type' => 'error'
);

return back()->with($notificaion);

    }

    //update new password

    User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)
    ]);

    
$notificaion = array(
    'message' => 'password updated successfully',
    'alert-type' => 'success'
);

return back()->with($notificaion);


}
//all admin user method

public function AllAdmin(){
    $alladmin = User::where('role','admin')->get();

    return view('backend.pages.admin.all_admin',compact('alladmin'));
}

public function AddAdmin(){
    $roles = Role::all();
    return view('backend.pages.admin.add_admin',compact('roles'));
}


}