<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use DB;
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
//import permission

public function ImportPermission () {

    return view('backend.pages.permission.import_permission');

}

//export

public function Export(){

    return Excel::download(new PermissionExport, 'permission.xlsx');
}

//import 

public function Import (Request $request){

    Excel::import(new PermissionImport, $request->file('import_file'));

    $notification = array(
        'message' => 'permission imported  successfully',
        'alert_type' =>'success'
    );
    return redirect()->back()->with($notification);
}

// roles 

public function AllRoles () {

    $roles = Role::all();

    return view('backend.pages.role.all_role',compact('roles'));

}

public function AddRoles (){

    return view('backend.pages.role.add_role');

}

public function StoreRole (Request $request) {

    $role= Role::create([
        'name' => $request->name,

    ]);

    $notification = array(
        'message' => 'Role created successfuly',
        'alert_type' =>'success'
    );

    return redirect()->route('all.roles')->with($notification);

}

public function EditRole ($id) {

$roles = Role::findOrFail($id);

return view ('backend.pages.role.edit_roles',compact('roles'));
}

public function UpdateRole (Request $request) {

$role_id = $request->id;
Role::findOrFail($role_id)->update([

    'name' => $request->name
]);
 

    $notification = array(
        'message' => 'Role updated successfuly',
        'alert_type' =>'success'
    );

    return redirect()->route('all.roles')->with($notification);

}

public function DeleteRole ($id){

    Role::findOrFail($id)->delete();

    $notification = array(
        'message' => 'role deleted successfully',
        'alert_type' =>'success'
    );
    return redirect()->back()->with($notification);

}


// add Roles and permission

public function  AddRolesPermission(){

    $roles = Role::all();
    $permissions = Permission::all(); 
    $permission_groups = User::getpermissionGroups();

    return view('backend.rolesetup.add_roles_permission',compact('roles','permissions','permission_groups'));
}

public function RolePermissionStore(Request $request)
{
    $data = array();
    $permissions = $request->permission;

    $permissionsArray = explode(',', $permissions);

    foreach ($permissionsArray as $key => $item) {
        $data['role_id'] = $request->role_id;
        $data['permission_id'] = $item;

        DB::table('role_has_permissions')->insert($data);
    }

    $notification = array(
        'message' => 'Role Permission added successfully',
        'alert_type' => 'success'
    );

    return redirect()->route('all.roles.permission')->with($notification);
}

public function AllRolesPermission(){
    $roles = Role::all();
    return view('backend.rolesetup.all_roles_permission',compact('roles'));
}


public function AdminEditRoles($id){
 
    $role = Role::findOrFail($id);
    $permissions = Permission::all(); 
    $permission_groups = User::getpermissionGroups();

    return view('backend.rolesetup.edit_roles_permission',compact('role','permissions','permission_groups'));

}

public function AdminUpdateRoles (Request $request ,$id){
    $role = Role::findOrFail($id);

    $permissions = $request->permission;
    
    if(!empty($permissions)){
        $role->syncPermissions($permissions);
    }

    $notification = array(
        'message' => 'Role Permission updated successfully',
        'alert_type' => 'success'
    );

    return redirect()->route('all.roles.permission')->with($notification);
}

public function AdminDeleteRoles ($id){

    $role = Role::findOrFail($id);
    
    if(!is_null($role)){
        $role->delete();
    }
    $notification = array(
        'message' => 'role in permission deleted successfully',
        'alert_type' =>'success'
    );
    return redirect()->back()->with($notification);
}
}

