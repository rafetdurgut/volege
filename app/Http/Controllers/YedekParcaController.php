<?php

namespace App\Http\Controllers;

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
}
