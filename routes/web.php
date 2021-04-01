<?php

use App\Http\Controllers\AnalizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\IconsController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ExComponentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\IsEmriController;
use App\Http\Controllers\SayfaController;

use App\Http\Controllers\TableController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ExtensionsController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EkspertizController;
use App\Http\Controllers\YedekParcaController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\MusteriController;
use App\Http\Controllers\AracController;
use App\Http\Controllers\cariController;
use App\Models\YedekParca;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

// dashboard Routes
// Route::get('/', [DashboardController::class, 'dashboardEcommerce'])->name('dashboard-ecommerce')->middleware('verified');
Route::get('/', [DashboardController::class, 'dashboardAnalytics'])->name('anasayfa')->middleware('auth');


Route::group(['prefix' => 'yedekparca'], function () {
    Route::match(['get', 'post'], 'ekle',  [YedekParcaController::class, 'ekle'])->name('yedekparca-ekle');
    Route::match(['get', 'post'], 'duzenle/{id}',  [YedekParcaController::class, 'duzenle'])->name('yedekparca-duzenle');
    Route::match(['get', 'post'], 'listele',  [YedekParcaController::class, 'listele'])->name('yedekparca-listele');
});


Route::group(['prefix' => 'cari'], function () {
    Route::match(['get', 'post'], 'ekle', [cariController::class, 'cariEkle'])->name('cari-ekle');
    Route::get('listele', [cariController::class, 'cariListele'])->name('cari-listele');
    Route::get('kontrol/{id}', [cariController::class, 'cariKontrol'])->name('cari-a-kontrol');
    Route::get('kontrol/', [cariController::class, 'cariKontrolBos'])->name('cari-kontrol');
    Route::match(['get', 'post'], 'kontrol', [cariController::class, 'cariKontrolBos'])->name('cari-kontrol');
    Route::match(['get', 'post'], 'duzenle/{id}', [cariController::class, 'cariDuzenle'])->name('cari-duzenle');
});

Route::group(['prefix' => 'analiz'], function () {
    Route::get('/', [AnalizController::class, 'analiz'])->name('analiz');
    Route::match(['get', 'post'], 'gelir', [AnalizController::class, 'gelir'])->name('analiz-gelir'); 
    Route::match(['get', 'post'], 'gider', [AnalizController::class, 'gider'])->name('analiz-gider');
    Route::match(['get', 'post'], 'stokencok', [AnalizController::class, 'stokencok'])->name('analiz-stokencok');
    Route::match(['get', 'post'], 'stokazalan', [AnalizController::class, 'stokazalan'])->name('analiz-stokazalan'); 
});


Route::group(['prefix' => 'fatura'], function () {
    Route::match(['get', 'post'], 'ekle',  [FaturaController::class, 'ekle'])->name('fatura-ekle');
    Route::match(['get', 'post'], 'odeme',  [FaturaController::class, 'odeme'])->name('fatura-odeme');
    Route::match(['get', 'post'], 'odemelistele',  [FaturaController::class, 'odemelistele'])->name('odeme-listele');
    Route::match(['get', 'post'], 'vadesigecmis',  [FaturaController::class, 'vadesiGecmisFaturalar'])->name('vade-listele');
    Route::match(['get', 'post'], 'satis-ekle',  [FaturaController::class, 'ekle'])->name('fatura-satis-ekle');
    Route::match(['get', 'post'], 'listele',  [FaturaController::class, 'listele'])->name('fatura-listele');
    Route::match(['get', 'post'], 'faturakapat/{faturakodu}',  [FaturaController::class, 'faturakapat'])->name('fatura-kapat');
    Route::get('hareket', [FaturaController::class, 'hareket'])->name('fatura-hareket');
    Route::get('goster', [FaturaController::class, 'goster'])->name('fatura-goster');
    Route::get('cari-listele', [FaturaController::class, 'cariListele'])->name('fatura-cari-listele');
});



Route::get('arama', [SayfaController::class, 'arama'])->name('arama');
Route::get('arama/musteri', [SayfaController::class, 'arama'])->name('arama-musteri');
Route::get('arama/arac', [SayfaController::class, 'arama'])->name('arama-arac');;
Route::get('arama/isemri', [SayfaController::class, 'arama']);
Route::get('arama/parca', [SayfaController::class, 'arama']);
Route::get('arama/ekspertiz', [SayfaController::class, 'arama']);
Route::post('arama/musteri', [SayfaController::class, 'aramaMusteri'])->name('arama-musteri');
Route::post('arama/arac', [SayfaController::class, 'aramaArac'])->name('arama-arac');
Route::post('arama/isemri', [SayfaController::class, 'aramaEmir'])->name('arama-isemri');
Route::post('arama/parca', [SayfaController::class, 'aramaParca'])->name('arama-parca');
Route::post('arama/ekspertiz', [SayfaController::class, 'aramaEkspertiz'])->name('arama-ekspertiz');

Route::match(['get', 'post'], 'arac/duzenle/{id}',  [AracController::class, 'aracDuzenle'])->name('arac-duzenle');
Route::group(['prefix' => 'isemri'], function () {
    Route::match(['get', 'post'], 'ekle',  [IsEmriController::class, 'isemriEkle'])->name('isemri-ekle');
    Route::match(['get', 'post'], 'duzenle/{id}',  [IsEmriController::class, 'isemriDuzenle'])->name('isemri-duzenle');
    Route::match(['get', 'post'], 'kapat',  [IsEmriController::class, 'isemriKapat'])->name('isemri-kapat');
    Route::match(['get', 'post'], 'arama',  [IsEmriController::class, 'isemriArama'])->name('isemri-arama');
    Route::post('isemrikapatmagetir', [IsEmriController::class, 'isemrikapatmagetir'])->name('isemrikapatmagetir');
    Route::get('listele', [IsEmriController::class, 'listele'])->name('isemri-listele');
    Route::get('goster/{id}', [IsEmriController::class, 'goster'])->name('isemri-goster');
    Route::get('kabul/{id}', [IsEmriController::class, 'kabul'])->name('isemri-kabul');
});

Route::group(['prefix' => 'ekspertiz'], function () {

    Route::match(['get', 'post'], 'ekle', [EkspertizController::class, 'ekle'])->name('ekspertiz-ekle');
    Route::get('goster/{id}', [EkspertizController::class, 'goster'])->name('ekspertiz-goster');
});


// Authentication  Route
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthenticationController::class, 'loginPage'])->name('auth-login');
    Route::get('register', [AuthenticationController::class, 'registerPage'])->name('auth-register');
    Route::get('forgot-password', [AuthenticationController::class, 'forgetPasswordPage'])->name('auth-forgot-password');
    Route::get('reset-password', [AuthenticationController::class, 'resetPasswordPage'])->name('auth-reset-password');
    Route::get('lock-screen', [AuthenticationController::class, 'authLockPage'])->name('auth-lock-screen');
});

// Authentication  Route
Route::group(['prefix' => 'kullanici'], function () {
    Route::get('giris', [AuthenticationController::class, 'loginPage'])->name('kullanici-giris');
    Route::get('cikis', [AuthenticationController::class, 'loginPage'])->name('kullanici-cikis');
    //Route::get('register', [AuthenticationController::class, 'registerPage'])->name('kullanici-kayit');
    Route::get('sifre-unuttum', [AuthenticationController::class, 'forgetPasswordPage'])->name('kullanici-sifre-unuttum');
    Route::get('sifre-resetle', [AuthenticationController::class, 'resetPasswordPage'])->name('kullanici-sifre-resetle');
    Route::get('hesap-kilit', [AuthenticationController::class, 'authLockPage'])->name('auth-hesap-kilit');
});


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap'])->name('lang-locale');


//Autocompletes
Route::post('/tcmusterigetir', [MusteriController::class, 'tcmusterigetir'])->name('tcmusterigetir');
Route::post('/adsoyadmusterigetir', [MusteriController::class, 'adsoyadmusterigetir'])->name('adsoyadmusterigetir');
Route::post('/plakaaracgetir', [AracController::class, 'plakaaracgetir'])->name('plakaaracgetir');
Route::post('/stoknoparcagetir', [YedekParcaController::class, 'stoknoyedekparca'])->name('stoknoyedekparca');
Route::post('/stokadparcagetir', [YedekParcaController::class, 'stokadyedekparca'])->name('stokadyedekparca');
Route::post('/faturaidgetir', [FaturaController::class, 'faturaidgetir'])->name('faturaidgetir');
Route::post('/odemeidgetir', [FaturaController::class, 'odemeidgetir'])->name('odemeidgetir');
