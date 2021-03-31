<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YedekParca;
use App\Models\Odeme;
use App\Models\Fatura;
use App\Models\FaturaDetay;
use Illuminate\Support\Facades\DB;

class AnalizController extends Controller
{
    //0-3 ay arasında değilse, yanlış gönder
    private function zamanKontrol($date1, $date2)
    {
        $diff = strtotime($date2) - strtotime($date1);
        if ($diff >  90 * 24 * 60 || $diff < 0) {
            return false;
        }
        return true;
        //usage
        // 3 aylık zaman bak
        //$aylikkontrol = $this->zamanKontrol($request->tarihilk, $request->tarihson);
        //if(!$aylikkontrol){
        //    return view('analiz.gelirgider', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'error' => 'Maksimum 3 aylık zaman dilimi için analiz yapılabilir. İlk tarih son tarihten büyük olamaz']);
        //}
    }

    //
    public function analiz()
    {
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"], ["name" => "Analiz"]
        ];
        return view('analiz.gelirgider', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }


    public function stokazalan(Request $request)
    {
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"], ["name" => "Analiz"]
        ];

        $stokaz = YedekParca::where('stokadet', "<=", $request->stokadet)->orderBy('stokadet')->get();

        return view('analiz.gelirgider', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'stokazalan' => $stokaz]);
    }


    public function stokencok(Request $request)
    {
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"], ["name" => "Analiz"]
        ];

        $yedekparcatoplam = FaturaDetay::select("yedekparcaid", DB::raw("SUM(miktar) as toplammiktar"))
            ->where([
                ['created_at', '>=', $request->tarihilk],
                ['created_at', '<=', $request->tarihson]
            ])
            ->groupBy("yedekparcaid");

        $yedekparcaliste = YedekParca::joinSub($yedekparcatoplam, 'yedektoplam', function ($join) {
            $join->on('yedekparca.id', '=', 'yedektoplam.yedekparcaid');
        })->select('yedekparca.*', 'yedektoplam.toplammiktar')->orderByDesc('yedektoplam.toplammiktar')->get();
        //return $yedekparcaliste;
        return view('analiz.gelirgider', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'stokencok' => $yedekparcaliste]);
    }


    public function gider(Request $request)
    {
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"], ["name" => "Analiz"]
        ];

        $odemedetay = Odeme::select("faturakodu", DB::raw("SUM(odenenmiktar) as toplamodenen"))
            ->where('odemetipi', 'Borç')
            ->where([
                ['odemetarihi', '>=', $request->tarihilk],
                ['odemetarihi', '<=', $request->tarihson]
            ])
            ->groupBy("faturakodu");

        $faturalar = Fatura::joinSub($odemedetay, 'odemedetay', function ($join) {
            $join->on('faturalar.faturakodu', '=', 'odemedetay.faturakodu');
        })->select('odemedetay.*', 'faturalar.faturadurum', 'faturalar.carikodu', 'faturalar.faturatoplam')->orderByDesc('faturalar.faturatarih')->get();
        //return $yedekparcaliste;
        return view('analiz.gelirgider', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'odemegider' => $faturalar]);
    }


    public function gelir(Request $request)
    {
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"], ["name" => "Analiz"]
        ];

        $odemedetay = Odeme::select("faturakodu", DB::raw("SUM(odenenmiktar) as toplamodenen"))
            ->where('odemetipi', 'Alacak')
            ->where([
                ['odemetarihi', '>=', $request->tarihilk],
                ['odemetarihi', '<=', $request->tarihson]
            ])
            ->groupBy("faturakodu");

        $faturalar = Fatura::joinSub($odemedetay, 'odemedetay', function ($join) {
            $join->on('faturalar.faturakodu', '=', 'odemedetay.faturakodu');
        })->select('odemedetay.*', 'faturalar.faturadurum', 'faturalar.carikodu', 'faturalar.faturatoplam')->orderByDesc('faturalar.faturatarih')->get();
        //return $yedekparcaliste;
        return view('analiz.gelirgider', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'odemegelir' => $faturalar]);
    }
}
