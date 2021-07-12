<?php

namespace App\Http\Controllers;

use App\Classes\Kategoriler;
use App\Models\ChatRoom;
use App\Models\Projeler;
use App\Models\roller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProjeController extends Controller
{

    public function kategorilerigoster(){
        $kategoriclass = new Kategoriler;
        $kategorisecenekleri = $kategoriclass->kategorileriGoster();
        $kkalankatilim = User::where('id', Auth::user()->id)->first()->kalankatilim;
        return view('uyepaneli.ilanolustur',array('kategoriler'=>$kategorisecenekleri, 'kalankatilim'=>$kkalankatilim));
    }

    public function testProjeler(){
        $projeler = Projeler::orderBy('id', 'DESC')->get();
        return view('projelertest',array('projeler'=>$projeler));
    }

    public function ProjeEkle(Request $request){

        $kkalankatilim = User::where('id', Auth::user()->id)->first()->kalankatilim;

        if($kkalankatilim>0){
            $kategoriclass = new Kategoriler;
            $kategorisecenekleri = $kategoriclass->kategorileriGoster();
            $liste = implode(',', $kategorisecenekleri);

            $validateData = $request->validate(
                [
                    'baslik' => 'required|string',
                    'aciklama' => 'required|string',
                    'kategori' => "required|string|in:$liste",
                ]
            );

            $tarih = date("Ymdhis");
            $rastgele = rand(1,99999);
            $Benzersizkimlik = $tarih.$rastgele;

            $yeniproje = new Projeler();

            $yeniproje -> ProjeBaslik = $request->baslik;
            $yeniproje -> ProjeAciklama = $request->aciklama;
            $yeniproje -> ProjeKategori = $request->kategori;
            $yeniproje -> Sahip = Auth::user()->name;
            $yeniproje -> Benzersizkimlik = $Benzersizkimlik;

            $yeniproje->save();

            $yeniolusturulanproje = DB::table('projelers')->where('Benzersizkimlik', '=', $Benzersizkimlik )->first();


            $yenichatroom = new ChatRoom();

            $yenichatroom -> name = $yeniolusturulanproje->ProjeBaslik;
            $yenichatroom -> ilan_id = $yeniolusturulanproje->id;

            $yenichatroom ->save();


            $yenirol = new roller();

            $yenirol -> ProjeId = $yeniolusturulanproje->id;
            $yenirol -> KullaniciId = Auth::id();
            $yenirol -> Seviye = 1;

            $yenirol->save();

            User::where('id', Auth::user()->id)->first()->decrement('kalankatilim', 1);

            return redirect()->route('ilansayfasi');
        }

        else{
            return back();
        }

    }

    public function ProjeSil(int $id){

        Projeler::where('id', $id)->delete();
        roller::where('ProjeId', $id)->delete();
        ChatRoom::where('ilan_id', $id)->delete();
        return back();

    }
}
