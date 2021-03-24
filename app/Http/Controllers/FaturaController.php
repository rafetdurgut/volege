<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeme;
use App\Models\Musteri;
use App\Models\Fatura;

class FaturaController extends Controller
{
  //
  public function ekle()
  {
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Fatura"], ["name" => "Göster"]
    ];
    return view('fatura.ekle', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }


  public function odeme(Request $request)
  {
    $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Fatura"], ["name" => "Ödeme"]
      ];
    if ($request->isMethod('GET')) {
      
      return view('fatura.odeme', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }
    if($request->isMethod('POST')){
      
      //fatura var mı bak
      $fatura_sayisi = Fatura::where("faturakodu", $request->faturakodu)->count();
      if($fatura_sayisi<1){
        return redirect()->route('fatura-odeme')->with('error', 'Fatura kayıtlarda bulunamadı!');
      }
      // TC var mı bak yoksa hata
      $musteri_sayisi =  Musteri::where("tc", "=",$request->carikodu)->count();
      if ($musteri_sayisi<1){
        return redirect()->route('fatura-odeme')->with('error', 'Cari kodu (Müşteri) kayıtlarda bulunamadı!');
      }
    
      //kayıt ekle
      $odeme = new Odeme();
      $odeme->faturakodu = $request->faturakodu;
      $odeme->carikodu = $request->carikodu;
      $odeme->odemetarihi = $request->odemetarihi;
      $odeme->odemetipi = $request->odemetipi;
      $odeme->odenenmiktar = $request->odenenmiktar;
      $odeme->aciklama = $request->aciklama;
      $odeme->odemekanali = $request->odemekanali;
      $odeme->save();
      return redirect()->route('fatura-odeme')->with('success', 'Ödeme başarıyla eklendi.');

      //belki otomatik kapatma için kontrol edilmeli. Fauranın tamamı ödendiyse, fautayı kapa.
      
    }
  }



  public function hareket()
  {
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Cari"], ["name" => "Hareket"]
    ];
    return view('fatura.hareket', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function goster()
  {
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Fatura"], ["name" => "Göster"]
    ];
    return view('fatura.goster', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function listele()
  {
    $pageConfigs = ['pageHeader' => true];
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Fatura"], ["name" => "Listele"]
    ];
    return view('fatura.listele', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function cariListele()
  {
    $pageConfigs = ['pageHeader' => true];
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Cari"], ["name" => "Listele"]
    ];
    return view('fatura.cari-listele', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function kasaListele()
  {
    $pageConfigs = ['pageHeader' => true];
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Kasa"]
    ];
    return view('fatura.kasa-listele', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
}
