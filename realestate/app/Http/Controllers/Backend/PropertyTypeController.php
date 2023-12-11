<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;


class PropertyTypeController extends Controller
{
    
public function AllType() {
    $types= PropertyType::latest()->get();

    return view('backend.type.all_type',compact('types'));
}

public function AddType(){

    return view ('backend.type.add_type');
}

public function StoreType(Request $request){

    //validation

    $request->validate([
        'type_name' => 'required|unique:property_types|max:200',
        'type_icon' => 'required'
    ]);

    PropertyType::insert([


        'type_name'=> $request->type_name,
        'type_icon'=> $request->type_icon

    ]);
    $notificaion = array(
        'message' => 'property created successfully',
        'alert-type' => 'success'
    );
    
    return redirect()-> route('all.type')->with($notificaion);
    
    

}

}
