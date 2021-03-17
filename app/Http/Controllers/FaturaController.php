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
    public function listele(){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Fatura"],["name" => "Listele"]
      ];
      return view('fatura.listele',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    public function cariListele(){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Cari"],["name" => "Listele"]
      ];
      return view('fatura.cari-listele',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    public function kasaListele(){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Kasa"]
      ];
      return view('fatura.kasa-listele',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
}
