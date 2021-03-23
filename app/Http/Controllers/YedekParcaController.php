<?php

namespace App\Http\Controllers;

use App\Models\YedekParca;
use Illuminate\Http\Request;

class YedekParcaController extends Controller
{
  public function ekle(Request $request)
  {
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Yedek Parça"], ["name" => "Ekle"]
    ];

    if ($request->isMethod('GET')) {
      return view('yedekparca.ekle', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    if ($request->isMethod('POST')) {

      $request->validate(
        [
          'stokkodu' => 'required',
          'stokadi' => 'required',
          'kdv' => 'required | min:1 | max:100',
        ]
      );

      //veriyi ekle
      $yedekparcabilgi = new YedekParca();
      $yedekparcabilgi->ureticikodu = $request->ureticikodu; //input('ureticikodu');
      $yedekparcabilgi->stokadi = $request->stokadi; //input('stokadi');
      $yedekparcabilgi->stokkodu = $request->stokkodu; //input('stokkodu');
      $yedekparcabilgi->barkod = $request->barkod; //input('barkod');
      $yedekparcabilgi->urungrup = $request->grup; //input('grup');
      $yedekparcabilgi->birim = $request->birim;
      $yedekparcabilgi->alisfiyati = $request->alisfiyati;
      $yedekparcabilgi->stokadet = $request->stokadet;
      $yedekparcabilgi->kdv = $request->kdv;
      $yedekparcabilgi->satisfiyati = $request->satisfiyati;
      $yedekparcabilgi->uyarimiktari = $request->uyarimiktari;
      $yedekparcabilgi->created_at = date("Y-m-d H:i:s");
      //insert
      $yedekparcabilgi->save();
      return redirect()->route('yedekparca-ekle')
        ->with('success', 'Yedek Parça Başarıyla Eklendi.');
    }
  }

  public function listele()
  {
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Yedek Parça"], ["name" => "Listele"]
    ];
    return view('yedekparca.listele', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }

  public function stoknoyedekparca(Request $request)
  {

    $search = $request->search;
    $parcalar =  array();
    if ($search != '') {
      $parcalar = YedekParca::orderby('stokkodu', 'asc')->where('stokkodu', 'like', '%' . $search . '%')->limit(5)->get();
    }

    $response = array();
    foreach ($parcalar as $parca) {
      $response[] = array("label" => $parca->stokkodu, "value" => $parca);
    }
    return $response;
  }
  public function stokadyedekparca(Request $request)
  {

    $search = $request->search;
    $parcalar =  array();
    if ($search != '') {
      $parcalar = YedekParca::orderby('stokadi', 'asc')->where('stokadi', 'like', '%' . $search . '%')->limit(5)->get();
    }

    $response = array();
    foreach ($parcalar as $parca) {
      if (isset($parca->ureticikodu))
        $response[] = array("label" => $parca->stokadi . "(" . $parca->ureticikodu . ")", "value" => $parca);
      else
        $response[] = array("label" => $parca->stokadi, "value" => $parca);
    }
    return $response;
  }
}
