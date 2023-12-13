<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    
public function AllPermission (){

    $permissions = Permission::all();
    return view ('backend.pages.permission.all_permission',compact('permissions'));
}

public function AddPermission () {

    return view ('backend.pages.permission.add_permission');
}

public function StorePermission (Request $request) {

    $permission = Permission::create([
        'name' => $request->name,
        'group_name' => $request->group_name,

    ]);

    $notification = array(
        'message' => 'permission created successfuly',
        'alert_type' =>'success'
    );

    return redirect()->route('all.permission')->with($notification);


}

public function EditPermission ($id) {

    $permissions = Permission::findOrFail($id);
    
    return view ('backend.pages.permission.edit_permission',compact('permissions'));

}

public function UpdatePermission (Request $request) {

    $per_id = $request->id;

    Permission::findOrFail($per_id)->update([
        'name' => $request->name,
        'group_name' => $request->group_name,
    ]);

    $notification = array(
        'message'=>'permission updated successfully',
        'alert_type' => 'success'
    );
    return redirect()->route('all.permission')->with($notification);
}
 
public function DeletePermission ($id) {

    Permission::findOrFail($id)->delete();

    $notification = array(
        'message' => 'permission deleted successfully',
        'alert_type' =>'success'
    );
    return redirect()->back()->with($notification);


}

public function ImportPermission () {

    return view('backend.pages.permission.import_permission');
}


// roles 

public function AllRoles () {

    $roles = Role::all();

    return view('backend.pages.role.all_role',compact('roles'));

}

}