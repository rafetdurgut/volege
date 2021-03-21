<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Arac;
use App\Models\IsEmri;
use DB;
use Illuminate\Database\Eloquent\Model;
class IsEmriController extends Controller
{
   public function listele(){
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "İş Emri"],["name" => "Listele"]
    ];
    $emirler = DB::table('isemirleri')->join('araclar','isemirleri.saseno','=','araclar.saseno')->join('musteriler','isemirleri.tc','=','musteriler.tc')->where('isemirleri.emiraktif','!=', 0)->select('isemirleri.*','araclar.plaka','musteriler.adsoyad')->get();

    return view('isemri.isemri-listele',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'emirler'=>$emirler]);
  }
  public function goster(){
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "İş Emri"],["name" => "Göster"]
    ];
    return view('isemri.isemri-goster',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }

  public function isemriEkle(Request $request)
  {
      if ($request->isMethod('GET')) {
          $pageConfigs = ['pageHeader' => true];
          $breadcrumbs = [
            ["link" => "/", "name" => "Home"],["link" => "#", "name" => "İş Emri"],["name" => "Yeni Ekle"]
          ];
          return view('isemri.isemri-ekle',);
      }

      if ($request->isMethod('POST')) {
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
          ["link" => "/", "name" => "Home"],["link" => "#", "name" => "İş Emri"],["name" => "Yeni Ekle."]
        ];
        
        $request->validate([
          'tckimlik' => 'required',
          'adsoyad' => 'required',
          'plaka' => 'required',
          'saseno' => 'required',
        ]);
        $musteri = Musteri::where('tc',$request->input('tckimlik'))->first();
        if(!isset($musteri))
        {
          $musteri = new Musteri();
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

        $arac = Arac::where('saseno',$request->input('saseno'))->first();
        if(!isset($arac))
        {
          $arac = new Arac();
        }
        $arac->plaka = $request->input('plaka');
        $arac->marka = $request->input('marka');
        $arac->motorno = $request->input('motorno');
        $arac->saseno = $request->input('saseno');
        $arac->model = $request->input('model');
        $arac->save();

        $isemri = new IsEmri();
        $isemri->saseno = $request->input('saseno');
        $isemri->tc = $request->input('tckimlik');
        $isemri->aracgiristarihi = $request->input('giristarihi');
        $isemri->arackm = $request->input('kilometre');
        $isemri->yakitdurumu = $request->input('yakit');
        $isemri->teslimeden = $request->input('teslimeden');
        $isemri->teslimalan = $request->input('teslimalan');
        $isemri->teknisyen = $request->input('teknisyen');
        $isemri->tahminitutar = $request->input('tahminitutar');
        $isemri->talep = e($request->input('talep'));
        $isemri->save();
        return redirect()->route('isemri-ekle')
                        ->with('success','İş Emri Eklendi.');
          //Musteri varsa guncelle yoksa ekle

          //Arac varsa guncelle yoksa ekle

          //Isemri Ekle
      }
  }
  public function isemriArama(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "İş Emri"],["name" => "Arama"]
    ];
    return view('isemri.isemri-arama',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }

  private function YedekParcaKaydet()
  {

  }
  public function isemriKapat(Request $req){

    $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "İş Emri"],["name" => "Kapat"]
      ];
    if($req->isMethod('GET'))
      {
      
      $araclar = DB::table('isemirleri')->join('araclar','isemirleri.saseno','=','araclar.saseno')->where('isemirleri.emiraktif',1)->select('isemirleri.id','araclar.saseno','araclar.plaka')->get();

      return view('isemri.isemri-kapat',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'araclar' => $araclar]);
    }


    $isemri = IsEmri::find( $req->input('saseno'));
    if(!isset($isemri))
      return back();


    if($req->input('action') == 'kayit')
    {
      //Kaydet
      $isemri->yapilanlar = e($req->input('yapilanlar'));
      $isemri->iscilik = $req->input('iscilik');
      //Yedek Parçaları ekle.
      //Varolanlari sil.
      DB::table('parcaisemri')->where('emirid', '=', $isemri->id)->delete();

      foreach($req->parcalar as $parca)
      {
        //Yenileri Ekle.
        DB::table('parcaisemri')->insert(
          [
            'emirid'=>$isemri->id,
            'yedekparcaid'=> intval($parca["parcaid"]),
            'satisfiyati'=> intval($parca["birimfiyat"]),
            'iskonto'=> $parca["iskonto"],
            'toplamfiyat'=> $parca["toplamtutar"],
            'adet'=> $parca["adet"],
          ]
        );
        //Kaydet.
      }
      $isemri->save();
      
      return back()->with('success',"Kayıt Başarı ile Güncellendi.");

    }
    else if($req->input('action') == 'cikis')
    {
      $isemri->yapilanlar = e($req->input('yapilanlar'));
      $isemri->iscilik = $req->input('iscilik');
      $isemri->emir_aktif = 0;
      //Yedek Parçaları ekle.
      $isemri->save();
    }
    else if($req->input('action') == 'fatura')
    {
        //Faturalaştır.
    }
  }
  public function isemrikapatmagetir(Request $request)
  {
    $search = $request->search;

    $parcalar = DB::table('parcaisemri')->join('yedekparca','parcaisemri.yedekparcaid','=','yedekparca.id')
                              ->where('parcaisemri.emirid', '=', $search)
                              ->select('yedekparca.stokkodu','yedekparca.stokadi','parcaisemri.adet','parcaisemri.satisfiyati','parcaisemri.toplamfiyat','parcaisemri.iskonto','yedekparca.id')
                              ->get();

    $isemirleri = IsEmri::find($search);
    $response = array();
    $response[] = array("isemirleri"=>$isemirleri, "parcalar"=>$parcalar);
    return $response;
  }
  
  
}
