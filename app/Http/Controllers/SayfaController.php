<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SayfaController extends Controller
{
    //
    public function arama(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Arama"]
      ];
      return view('sayfalar.arama',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
}
