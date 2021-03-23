<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Arac;
use App\Models\Ekspertiz;
use DB;
use Carbon;

class EkspertizController extends Controller
{
    //
    public function ekle(Request $request){


      
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Ekspertiz"],["name" => "Ekle"]
      ];

      if ($request->isMethod('GET')) {
        return view('ekspertiz.ekspertiz',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
      }
      
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

      $ekspertiz = new Ekspertiz();
      $ekspertiz->saseno = $request->input('saseno');
      $ekspertiz->tc = $request->input('tckimlik');
      $ekspertiz->aracgiristarihi = $request->input('giristarihi');
      $ekspertiz->arackm = $request->input('kilometre');
      $ekspertiz->yakitdurumu = $request->input('yakit');
      
      if(($request->has('resim')))
      {
        $file = $request->file('resim');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'-'.$extension;
        $file->move('uploads/ekspertiz/'.$filename);
        $ekspertiz->resimurl = 'uploads/ekspertiz/'.$filename;
      }


      //Parçalar.
      $ekspertiz->save();


     
      //Parçalar.
      foreach($request->parcalar as $parca)
      {
        if( isset($parca["parcaid"]))
        {
        //Yenileri Ekle.
        DB::table('parcaekspertiz')->insert(
          [
            'ekspertizid'=>$ekspertiz->id,
            'yedekparcaid'=> intval($parca["parcaid"]),
            'satisfiyati'=> floatval($parca["birimfiyat"]),
            'toplamfiyat'=> floatval($parca["toplamtutar"]),
            'adet'=> floatval($parca["adet"]),
          ]
        );
        }
      }  
      return view('ekspertiz.ekspertiz',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs,'success'=>"Ekspertiz başarı ile eklendi."]);
      


    }
    public function resimliEkspertiz(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Ekspertiz"],["name" => "Resim Ekle"]
      ];
      return view('ekspertiz.resimli-ekspertiz',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
}
