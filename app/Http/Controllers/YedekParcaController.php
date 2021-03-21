<?php

namespace App\Http\Controllers;
use App\Models\YedekParca;
use Illuminate\Http\Request;

class YedekParcaController extends Controller
{
     public function ekle(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Yedek Parça"],["name" => "Ekle"]
      ];
      return view('yedekparca.ekle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    public function listele(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Yedek Parça"],["name" => "Listele"]
      ];
      return view('yedekparca.listele',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }

      public function stoknoyedekparca(Request $request)
      {
        
          $search = $request->search;
          $parcalar =  array();
          if($search != ''){
              $parcalar = YedekParca::orderby('stokkodu','asc')->where('stokkodu', 'like', '%' .$search . '%')->limit(5)->get();
          }
    
          $response = array();
          foreach($parcalar as $parca){
              $response[] = array("label"=>$parca->stokkodu,"value"=>$parca);
          }
          return $response;    
      }
      public function stokadyedekparca(Request $request)
      {
        
          $search = $request->search;
          $parcalar =  array();
          if($search != ''){
              $parcalar = YedekParca::orderby('stokadi','asc')->where('stokadi', 'like', '%' .$search . '%')->limit(5)->get();
          }
    
          $response = array();
          foreach($parcalar as $parca){
            if(isset($parca->ureticikodu))
              $response[] = array("label"=>$parca->stokadi ."(".$parca->ureticikodu.")","value"=>$parca);
            else
              $response[] = array("label"=>$parca->stokadi,"value"=>$parca);
          }
          return $response;    
      }
}


