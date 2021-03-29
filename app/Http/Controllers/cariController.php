<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Fatura;
use App\Models\Odeme;
use PhpParser\Node\Expr\New_;

class cariController extends Controller
{
    //

    public function cariKontrolBos(Request $request)
    {

      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Cari"], ["name" => "Hareket"]
      ];
      if($request->isMethod('GET'))
      {
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
          ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Cari"], ["name" => "Hareketler"]
        ];
        return view('cari.cari-kontrol', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
      }

      if($request->input('tckimlik'))
      {
        $id = Musteri::where('tc',$request->input('tckimlik'))->select('id')->first();
      }
      elseif($request->input('adsoyad'))
      {
        $id = Musteri::where('adsoyad',$request->input('adsoyad'))->select('id')->first();
      }

      if(isset($id))
      {
        return redirect('/cari/kontrol/'.$id->id);
      }
      else
      {
        return view('cari.cari-kontrol', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs,'error'=>'Böyle bir kayıt bulunamadı!']);
      }



    }

    public function cariKontrol($id)
    {
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"], ["link" => "#", "name" => "Cari"], ["name" => "Hareket"]
      ];

      $musteri = Musteri::find($id);
        if(!isset($musteri))
          abort(404);

      $faturalar = Fatura::where("faturalar.carikodu", $musteri->tc)
                    ->select('faturalar.faturakodu','faturalar.faturatoplam')
                    ->orderby('faturalar.updated_at','asc')->get();

      $kayitlar = array();
      $genelbakiye = 0;
      foreach($faturalar as $fatura)
      {
        $fatura->bakiye -= $fatura->faturatoplam;
        $genelbakiye -= $fatura->faturatoplam;

        $odemeler = Odeme::where('faturakodu',$fatura->faturakodu)->orderby('id','desc')->get();
        if(isset($odemeler))
        {
          $bakiye = $fatura->bakiye;
          array_push($kayitlar, $fatura);
          foreach($odemeler as $odeme)
          {
            $n_fatura = $fatura->replicate();;
            $n_fatura->bakiye = $bakiye;
            $n_fatura->bakiye += $odeme->odenenmiktar;
            $bakiye = $n_fatura->bakiye;
            $n_fatura->odeme = $odeme;
            $genelbakiye += $odeme->odenenmiktar;

            array_push($kayitlar, $n_fatura);
          }
        }
        else
        {
          array_push($kayitlar, $fatura);
        }
      }
      //return $kayitlar;
      return view('cari.kontrol', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs,'cari'=>$musteri, 'genelBakiye'=>$genelbakiye,'kayitlar'=>$kayitlar]);
    }
    public function cariDuzenle($id, Request $request)
    {
      $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
          ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Cari"],["name" => "Yeni Kayıt"]
        ];
      if($request->isMethod('GET'))
      {
        $musteri = Musteri::where('tc','=',$id)->first();
        if(isset($musteri))
          return view('cari.duzenle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs, 'musteri'=> $musteri]);
        else
          abort(404);
      }



      $request->flash();
      $musteri = Musteri::where('tc','=', $id)->first();
      if(!isset($musteri))
      {
        return view('cari.duzenle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'error'=>"Böyle bir kayıt yok."]);
      }
      $musteri->tc = $request->input('tckimlik');
      $musteri->adsoyad = $request->input('adsoyad');
      $musteri->email = $request->input('eposta');
      $musteri->adres = $request->input('adres');
      $musteri->telefon = $request->input('telefon');
      $musteri->vergino = $request->input('vergino');
      $musteri->vergidairesi = $request->input('vergidairesi');
      $musteri->ticaridurum = $request->input('ticaridurum');
      $musteri->save();
      return view('cari.duzenle',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'musteri'=>$musteri, 'success'=>"Kayıt başarı ile düzenlendi."]);

    }
    public function cariListele(){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Cari"],["name" => "Listele"]
      ];

      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Arama"]
      ];
      $musteriler = Musteri::select('*');
      $musteriler = $musteriler->get();

      return view('cari.cari-listele',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'musteriler'=>$musteriler]);
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
