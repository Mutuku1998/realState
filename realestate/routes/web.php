<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// admin middleware
Route::middleware(['auth','roles:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

});



Route::middleware(['auth','roles:agent'])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');


});



Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


//allpropertytype routes

Route::middleware(['auth','roles:admin'])->group(function(){

    Route::controller(PropertyTypeController::class)->group(function(){

        Route::get('/all/type', 'AllType')->name('all.type');
        
        Route::get('/add/type', 'AddType')->name('add.type');

        Route::post('/add/store', 'StoreType')->name('store.type');

        Route::get('/add/edit/{id}', 'EditType')->name('edit.type');

        
        Route::post('/update/store', 'UpdateType')->name('update.type');

        Route::get('/delete/store/{id}', 'DeleteType')->name('delete.type');

    });

    // all amenities routes

    
    Route::controller(PropertyTypeController::class)->group(function(){

        Route::get('/all/amenitie', 'AllAmenitie')->name('all.amenitie');
        Route::get('/add/amenitie', 'AddAmenitie')->name('add.amenitie');
        Route::post('/store/amenitie', 'StoreAmenitie')->name('store.amenitie');
        Route::get('/edit/amenitie/{id}', 'EditAmenitie')->name('edit.amenitie');
        Route::post('/update/amenitie', 'UpdateAmenitie')->name('update.amenitie');
        
        Route::get('/delete/amenitie/{id}', 'DeleteAmenitie')->name('delete.amenitie');

    });
    

    
    Route::controller(RoleController::class)->group(function(){

        Route::get('/all/permissions', 'AllPermission')->name('all.permission');
        
        Route::get('/add/permission', 'AddPermission')->name('add.permission');

        Route::post('/permission/store', 'StorePermission')->name('store.permission');

        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');

        
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');

        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');



        Route::get('/import/permissions', 'ImportPermission')->name('import.permission');

    });

    //roles route 

    Route::controller(RoleController::class)->group(function(){

        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        
        Route::get('/add/role', 'AddRoles')->name('add.roles');

        Route::post('/role/store', 'StoreRole')->name('store.role');

        Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');

        
        Route::post('/update/role', 'UpdateRole')->name('update.role');

        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');




        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');

        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');

        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');

        Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');

        
        Route::post('/admin/role/update/{id}', 'AdminUpdateRoles')->name('admin.roles.update');

        Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');
        
    });

    // admin user routes

Route::controller(AdminController::class)->group(function(){

Route::get('/all/admin', 'AllAdmin')->name('all.admin');

Route::get('/add/admin', 'AddAdmin')->name('add.admin');

Route::post('/store/admin', 'StoreAdmin')->name('store.admin');

Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');

Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');

});



});