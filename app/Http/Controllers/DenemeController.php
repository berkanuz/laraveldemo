<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Deneme;
use Illuminate\Http\Request;
class DenemeController extends BaseController
{

    public function getDeneme(Request $request, $isim){
    	//dd($isim);
    	//$isim2 = $request->route('isim');
    	$size = $request->get('size');
    	//dd($size);
    	$deneme = Deneme::where('isim', $isim)->take($size)->get();
    	return response()->json($deneme,200);
    }	

    public function updateDeneme(Request $request, $isim)
    {
    	$yeni_isim = $request->get('yeni_isim');
    	//dd($yeni_isim);
    	$deneme = Deneme::where('isim',$isim) -> first();
//dd($isim);
    	$deneme -> isim = $yeni_isim;
    	$deneme->save();


    	return response()->json($deneme,200);


    	//dd($isim);
    }

}
