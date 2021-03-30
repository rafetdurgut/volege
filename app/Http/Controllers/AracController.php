<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arac;
class AracController extends Controller
{
   public function aracDuzenle($id, Request $request)
   {
      $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
          ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Araç"],["name" => "Düzenle"]
        ];
      if($request->isMethod('GET'))
      {
        $arac = Arac::where('id','=',$id)->first();
        if(isset($arac))
          return view('isemri.arac-duzenle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs, 'arac'=> $arac]);
        else
          abort(404);
      }

      $request->flash();
      $arac = Arac::where('id','=', $id)->first();
      if(!isset($arac))
      {
        return view('isemri.arac-duzenle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'error'=>"Böyle bir kayıt yok."]);
      }
      $arac->plaka = $request->input('plaka');
      $arac->saseno = $request->input('saseno');
      $arac->motorno = $request->input('motorno');
      $arac->marka = $request->input('marka');
      $arac->model = $request->input('model');
      $arac->yil = $request->input('yil');
      $arac->save();
      return view('isemri.arac-duzenle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'arac'=>$arac, 'success'=>"Kayıt başarı ile düzenlendi."]);
   }

   public function plakaaracgetir(Request $request)
   {
      $search = $request->search;
      if($search == ''){
         $araclar = Arac::orderby('plaka','asc')->limit(5)->get();
      }else{
         $araclar = Arac::orderby('plaka','asc')->where('plaka', 'like', $search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($araclar as $arac){
         $response[] = array("label"=>$arac->plaka,"value"=>$arac);
      }
      return $response;


   }
}
