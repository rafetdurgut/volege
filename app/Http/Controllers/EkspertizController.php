<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EkspertizController extends Controller
{
    //
    public function ekle(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Ekspertiz"],["name" => "Ekle"]
      ];
      return view('ekspertiz.ekspertiz',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    public function resimliEkspertiz(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Ekspertiz"],["name" => "Resim Ekle"]
      ];
      return view('ekspertiz.resimli-ekspertiz',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
}
