<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
class MusteriController extends Controller
{
    //
public function tcmusterigetir(Request $request)
  {
      $search = $request->search;
      if($search == ''){
         $musteriler = Musteri::orderby('tc','asc')->limit(5)->get();
      }else{
         $musteriler = Musteri::orderby('tc','asc')->where('tc', 'like',$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($musteriler as $musteri){
         $response[] = array("label"=>$musteri->tc,"value"=>$musteri);
      }
      return $response;
  }
  public function adsoyadmusterigetir(Request $request)
  {
      $search = $request->search;
      if($search == ''){
         $musteriler = Musteri::orderby('adsoyad','asc')->limit(5)->get();
      }else{
         $musteriler = Musteri::orderby('adsoyad','asc')->where('adsoyad', 'like', $search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($musteriler as $musteri){
         $response[] = array("label"=>$musteri->adsoyad,"value"=>$musteri);
      }

      return $response;


  }

}
