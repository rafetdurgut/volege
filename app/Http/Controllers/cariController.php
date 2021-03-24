<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use PhpParser\Node\Expr\New_;

class cariController extends Controller
{
    //
    public function cariListele(){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Cari"],["name" => "Listele"]
      ];
      return view('fatura.cari-listele',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    public function cariEkle(Request $request){
      $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
          ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Cari"],["name" => "Yeni Kayıt"]
        ];
      if($request->isMethod('GET'))
      {
        return view('cari.ekle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
      }
      $request->flash();
      $musteri = Musteri::where('tc',$request->input('tckimlik'))->first();
      if(isset($musteri))
      {
        return view('cari.ekle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'error'=>"Böyle bir kayıt var."]);
      }
      $musteri = New Musteri();
      $musteri->tc = $request->input('tckimlik');
      $musteri->adsoyad = $request->input('adsoyad');
      $musteri->email = $request->input('eposta');
      $musteri->adres = $request->input('adres');
      $musteri->telefon = $request->input('telefon');
      $musteri->vergino = $request->input('vergino');
      $musteri->vergidairesi = $request->input('vergidairesi');
      $musteri->ticaridurum = $request->input('ticaridurum');
      $musteri->save();

      return view('cari.ekle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'success'=>"Kayıt başarı ile eklendi."]);
    }
}
