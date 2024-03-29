<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Arac;
use App\Models\IsEmri;
use App\Models\YedekParca;
use App\Models\Ekspertiz;
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

        $musteriler = $musteriler->limit(50)->get();
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

        $araclar = $araclar->limit(50)->get();
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
      $emirler->leftJoin('araclar','isemirleri.saseno','=','araclar.saseno')->leftJoin('musteriler','isemirleri.tc','=','musteriler.tc');

      $emirler = $emirler->select('isemirleri.id','araclar.plaka','musteriler.adsoyad','isemirleri.aracgiristarihi','isemirleri.araccikistarihi')->limit(50)->get();
      return view('sayfalar.arama',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'emirler' => $emirler]);
    }
    public function aramaParca(Request $request){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Arama"]
      ];

      $parcalar = YedekParca::select('*');
      if($request->input('stokkodu'))
        $parcalar->where('stokkodu','LIKE','%'.$request->input('stokkodu').'%');

      if($request->input('parcaadi'))
        $parcalar->where('stokadi','LIKE','%'.$request->input('parcaadi').'%');

      if($request->input('grup'))
        $parcalar->where('urungrup','LIKE','%'.$request->input('grup').'%');

      $parcalar = $parcalar->limit(50)->get();
      return view('sayfalar.arama',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'parcalar' => $parcalar]);
    }


    public function aramaEkspertiz(Request $request){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Arama"]
      ];


      $eksperler = Ekspertiz::select('*');
      if($request->input('ekspertizkodu'))
        $eksperler->where('ekspertiz.id','LIKE','%'.$request->input('ekspertizkodu').'%');


      if($request->input('ekspertiztarihi'))
      {
        $tarih = Carbon::parse($request->input('ekspertiztarihi'))->format('Y-m-d');
        $eksperler->whereDate('ekspertiz.aracgiristarihi','=',$tarih);
      }

      if($request->input('plaka'))
      {
        $eksperler->where('araclar.plaka','LIKE','%'.$request->input('plaka').'%');
      }

      $eksperler->leftJoin('araclar','ekspertiz.saseno','=','araclar.saseno')->leftJoin('musteriler','ekspertiz.tc','=','musteriler.tc');

      $eksperler = $eksperler->select('ekspertiz.id','araclar.plaka','musteriler.adsoyad','ekspertiz.aracgiristarihi','ekspertiz.resimurl')->limit(50)->get();
      return view('sayfalar.arama',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'eksperler' => $eksperler]);
    }


}
