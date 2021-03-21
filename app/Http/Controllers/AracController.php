<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arac;
class AracController extends Controller
{
    public function plakaaracgetir(Request $request)
    {
      
  
      $search = $request->search;
  
        if($search == ''){
           $araclar = Arac::orderby('plaka','asc')->limit(5)->get();
        }else{
           $araclar = Arac::orderby('plaka','asc')->where('plaka', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($araclar as $arac){
           $response[] = array("label"=>$arac->plaka,"value"=>$arac);
        }
  
        return $response;
  
  
    }
}
