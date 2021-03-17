<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IsEmriController extends Controller
{
   public function listele(){
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "İş Emri"],["name" => "Listele"]
    ];
    return view('isemri.isemri-listele',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  public function goster(){
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "İş Emri"],["name" => "Göster"]
    ];
    return view('isemri.isemri-goster',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
}
