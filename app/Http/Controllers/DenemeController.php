<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Deneme;
use Illuminate\Http\Request;
class DenemeController extends BaseController
{

    public function CreateDeneme(Request $request){
    	$name = $request->get('name');
    	$surname = $request -> get('surname');

    	if(!isset($name)) {
    		return response()->json('name is not found',400);
    	}
    	elseif (!isset($surname)) {
    		return response()->json('surname is not found',400);
    	}

       	$deneme = new Deneme;
    	$deneme->name = $name;
    	$deneme->surname = $surname;
    	$deneme->save();

    	$fatchedDeneme = Deneme::where('id',$deneme->id) -> first();


    	return response()->json($fatchedDeneme,200);

    }

    public function getDeneme(Request $request, $name){
    	//dd($name);
    	//$name2 = $request->route('name');
    	$size = $request->get('size');
    	//dd($size);
    	$deneme = Deneme::where('name', $name)->take($size)->get();
    	return response()->json($deneme,200);
    }	

    public function updateDeneme(Request $request, $name)
    {
    	$new_name = $request->get('new_name');
    	//dd($new_name);
    	$deneme = Deneme::where('name',$name) -> first();
//dd($name);
    	$deneme -> name = $new_name;
    	$deneme->save();


    	return response()->json($deneme,200);


    	//dd($name);
    }

}
