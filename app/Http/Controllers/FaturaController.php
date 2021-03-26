<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeme;
use App\Models\Musteri;
use App\Models\Fatura;
use App\Models\FaturaDetay;
use Illuminate\Support\Facades\DB;

class FaturaController extends Controller
{
  //
  public function ekle(Request $request)
  {
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Fatura"], ["name" => "Göster"]
    ];

    if ($request->isMethod('GET')) {
      return view('fatura.ekle', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    if ($request->isMethod('POST')) {
            
      //fatura var mı kontrol et, varsa başka kod yazmasını zorla
      $fatura_sayisi = Fatura::where("faturakodu", $request->faturakodu)->count();
      if ($fatura_sayisi > 0) {
        return redirect()->route('fatura-ekle')->with('error', 'Fatura kodu daha önce girilmiş! Başka bir kod girin veya Oluştur tıklayın!');
      }

      //musteri var mı bak, yoksa kaydetmek icin zorla
      $musteri_sayisi =  Musteri::where("tc", $request->carikodu)->count();
      if ($musteri_sayisi < 1) {
        return redirect()->route('fatura-ekle')->with('error', 'Cari kodu (Müşteri) kayıtlarda bulunamadı! Önce müşteriyi oluşturun.');
      }

      //her sey yolunda fatura ekle
      $yenifatura = new Fatura();
      $yenifatura->faturakodu = $request->faturakodu;
      $yenifatura->carikodu = $request->carikodu;
      $yenifatura->faturatarih = $request->faturatarihi;
      $yenifatura->vade = $request->vade;
      $yenifatura->faturatipi = $request->faturatipi;
      $yenifatura->faturadurum = $request->faturadurum;
      $yenifatura->gibno = $request->gibkodu;
      

      //geri kalan tüm parcalari parca detay tablosuna yaz.
      //işemrinde parçalar aynısı. çek oradan.
      $toplam_tutar = 0;
      foreach ($request->parcalar as $parca) {
        if (isset($parca["parcaid"])) {
          $detay = new FaturaDetay();
          $detay->faturaid = $request->faturakodu;
          $detay->yedekparcaid = intval($parca["parcaid"]);
          $detay->miktar = $parca["adet"];
          $detay->fiyat = floatval($parca["birimfiyat"]);
          $detay->iskonto = $parca["iskonto"];
          $detay->stoktandusme = boolval(0); // Sonradan eklensin 

          $detay->save();
          $toplam_tutar = $toplam_tutar + floatval($parca['toplamtutar']);
        }
      }
      //toplam tutarı kaydet.
      $yenifatura->faturatoplam = round($toplam_tutar * 1.18, 2);
      // fatura kaydet
      $yenifatura->save();

      return redirect()->route('fatura-ekle')->with('success', 'Fatura başarıyla eklendi.');
    }
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
    if ($request->isMethod('POST')) {

      //fatura var mı bak
      $fatura_sayisi = Fatura::where("faturakodu", $request->faturakodu)->count();
      if ($fatura_sayisi < 1) {
        return redirect()->route('fatura-odeme')->with('error', 'Fatura kayıtlarda bulunamadı!');
      }
      // TC var mı bak yoksa hata
      $musteri_sayisi =  Musteri::where("tc", "=", $request->carikodu)->count();
      if ($musteri_sayisi < 1) {
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




  public function listele(Request $request)
  {
    $pageConfigs = ['pageHeader' => true];
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Fatura"], ["name" => "Listele"]
    ];

    //her fatura icin parca toplam tutar bul
    $odenen_miktarlar = DB::table('odeme')
                            ->select("faturakodu", DB::raw("SUM(odenenmiktar) as toplamodenenmiktar"))
                            ->groupBy('faturakodu'); 
    
    $birlesik_tablo = DB::table('faturalar') 
                          ->join('musteriler', 'musteriler.tc', '=', 'faturalar.carikodu') //musterilerin adsoyad cekmek icin
                          ->joinSub($odenen_miktarlar, 'odenentoplam', function ($join) {  //ödenen tutarı almak için
                              $join->on('faturalar.faturakodu', '=', 'odenentoplam.faturakodu');
                          })->select('faturalar.*', 'musteriler.adsoyad','odenentoplam.*')
                          ->get(); 
    
    return view('fatura.listele', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'faturalar'=>$birlesik_tablo]);
    

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
