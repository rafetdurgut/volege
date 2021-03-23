<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Arac;
use App\Models\IsEmri;
use Carbon\Carbon;

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
    public function aramaMusteri(Request $request){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Arama"]
      ];
      $musteriler = Musteri::select('*');
      if($request->input('tckimlikno'))
        $musteriler->where('tc','LIKE','%'.$request->input('tckimlikno').'%');

      if($request->input('adsoyad'))
        $musteriler->where('adsoyad','LIKE','%'.$request->input('adsoyad').'%');

        $musteriler = $musteriler->get();
      return view('sayfalar.arama',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'musteriler' => $musteriler]);
    }

    public function aramaArac(Request $request){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Arama"]
      ];
      $araclar = Arac::select('*');
      if($request->input('plaka'))
        $araclar->where('plaka','LIKE','%'.$request->input('plaka').'%');

      if($request->input('saseno'))
        $araclar->where('saseno','LIKE','%'.$request->input('saseno').'%');

        $araclar = $araclar->get();
      return view('sayfalar.arama',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'araclar' => $araclar]);
    }

    public function aramaEmir(Request $request){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Arama"]
      ];
      $emirler = IsEmri::select('*');
      if($request->input('emirkodu'))
        $emirler->where('isemirleri.id','LIKE','%'.$request->input('emirkodu').'%');
      $tarih = Carbon::parse($request->input('emirtarihi'))->format('Y-m-d');

      if($request->input('emirtarihi'))
        $emirler->whereDate('isemirleri.aracgiristarihi','=',$tarih);
      $emirler->join('araclar','isemirleri.saseno','=','araclar.saseno')->join('musteriler','isemirleri.tc','=','musteriler.tc');

      $emirler = $emirler->get();
      return view('sayfalar.arama',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'emirler' => $emirler]);
    }

}
