<?php

use App\Http\Controllers\adminislem;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\ilanlar;
use App\Http\Controllers\ProjeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/iletisim', function () {
    return view('homepage');
})->name('iletisim');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [dashboard::class, 'anasayfa'])->name('dashboard');








Route::get('/projeler',[ProjeController::class,'testProjeler'])->name('test_projeler');



Route::middleware(['auth:sanctum', 'verified'])->post('proje/store', [ProjeController::class, 'ProjeEkle'])->name('post_proje');

Route::middleware(['auth:sanctum', 'verified'])->get('/proje/delete/{id}',[ProjeController::class,'ProjeSil'])->name('proje_delete');



Route::get('/ilanlar',[ilanlar::class, 'ilanleriListele'])->name('ilansayfasi');
Route::get('ilanlar/filtre/{kategori}',[ilanlar::class, 'ilanFiltre'])->name('ilan_filtre');




Route::get('ilanlar/Detay/{id}',[ilanlar::class, 'ilanDetay'])->name('ilan_detay');


Route::get('/ilanolustur',[ProjeController::class,'kategorilerigoster'])->middleware('auth')->name('yeniilanolustur');

Route::middleware(['auth:sanctum', 'verified'])->get('/takimlarim',[ilanlar::class, 'kullaniciIlanlari'])->name('kullaniciIlanlari');




//takimyonet

Route::get('takimlarim/yonet/{id}',[ilanlar::class, 'ilanYonet'])->middleware('auth')->name('ilanyonet');

Route::get('/ayril/{id}',[ilanlar::class, 'Ayril'])->middleware('auth')->name('ayril');

Route::get('takimlarim/yonet/takimdancikar/{ilanid}/{userid}',[ilanlar::class, 'takimdanCikar'])->middleware('auth')->name('takimdanCikar');






Route::get('/takimsayfasi/{id}',[ilanlar::class, 'takimSayfasi'])->middleware('auth')->name('takimsayfasi');

Route::get('/takima_katil/{id}',[ilanlar::class, 'takimaKatil'])->middleware('auth')->name('takima_katil');




Route::middleware(['auth:sanctum', 'verified'])->get('/admin',[adminislem::class, 'adminpaneli'])->name('paneladmin');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/projepaneli',[adminislem::class, 'projeleriListele'])->name('proje_paneli');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/uyepaneli',[adminislem::class, 'uyeleriListele'])->name('üye_paneli');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/uyedelete/{id}',[adminislem::class,'uyeSil'])->name('uye_delete');



Route::middleware(['auth:sanctum', 'verified'])->get('/admin/iletisimsil/{id}',[adminislem::class, 'contactSil'])->name('iletisimsil');
Route::get('/iletisim', [ContactUsFormController::class, 'createForm'])->name('iletisim');
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');













//Chat sistemi

Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function () {
    return view('Chat/container');
})->name('chat');


Route::middleware('auth:sanctum')->get('/chat/rooms/{ilanId}', [ChatController::class, 'rooms']);
Route::middleware('auth:sanctum')->get('/chat/rooms/{roomId}/messages', [ChatController::class, 'messages']);
Route::middleware('auth:sanctum')->post('/chat/rooms/{roomId}/messages', [ChatController::class, 'newMessage']);

