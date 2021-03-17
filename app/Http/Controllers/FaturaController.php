<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaturaController extends Controller
{
    //
    public function ekle(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Fatura"],["name" => "Göster"]
      ];
      return view('fatura.ekle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    public function odeme(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Fatura"],["name" => "Ödeme"]
      ];
      return view('fatura.odeme',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    public function hareket(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Cari"],["name" => "Hareket"]
      ];
      return view('fatura.hareket',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    public function goster(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Fatura"],["name" => "Göster"]
      ];
      return view('fatura.goster',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
}
