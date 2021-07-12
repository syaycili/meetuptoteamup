<?php

namespace App\Http\Controllers;

use App\Classes\Kategoriler;
use App\Models\Projeler;
use App\Models\roller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ilanlar extends Controller
{
    public function ilanleriListele(){
        $projeler = Projeler::orderBy('id', 'DESC')->paginate(6);
        $kategoriclass = new Kategoriler;
        $kategorisecenekleri = $kategoriclass->kategorileriGoster();
        return view('ilanlar.ilanlar',array('ilanlar'=>$projeler, 'SeciliKategori'=>'Tamamı', 'kategoriler'=>$kategorisecenekleri));
    }

    public function ilanFiltre(string $kategori){
        $projeler = Projeler::where('ProjeKategori', $kategori)->orderBy('id', 'DESC')->paginate(6);
        $kategoriclass = new Kategoriler;
        $kategorisecenekleri = $kategoriclass->kategorileriGoster();
        return view('ilanlar.ilanlar',array('ilanlar'=>$projeler, 'SeciliKategori'=>$kategori, 'kategoriler'=>$kategorisecenekleri));
    }





    public function kullaniciIlanlari(){
        //$kullaniciprojeler = Projeler::where('id', roller::where('KullaniciId', Auth::user()->id)->ProjeId)->orderBy('id', 'DESC')->paginate(4);

        $roller = roller::where('KullaniciId', Auth::user()->id)->orderBy('id', 'DESC')->get();


        $kullaniciilanlari = array();
        foreach ($roller as $rol) {
        $projeid = $rol->ProjeId;

        $ilan = Projeler::where('id', $projeid)->first();
        $kullaniciilanlari[] = $ilan;
        }

        return view('uyepaneli.ilanlarim.ilanlarim',array('ilanlar'=> $kullaniciilanlari));
    }

    public function ilanDetay(int $id){

        $ilan = Projeler::where('id', $id)->first();

        if(null !== (Auth::user())){
            $kkalankatilim = User::where('id', Auth::user()->id)->first()->kalankatilim;
            if(null !== (DB::table('rollers')->where('ProjeId', '=', $id)->where('KullaniciId', '=', Auth::user()->id)->first())){
            return view('ilanlar.ilandetay', array('ilan'=>$ilan,'katilim'=>1, 'kalankatilim' => $kkalankatilim));
            }
            else{return view('ilanlar.ilandetay', array('ilan'=>$ilan,'katilim'=>0, 'kalankatilim' => $kkalankatilim));}
        }
        else{
            return view('ilanlar.ilandetay', array('ilan'=>$ilan,'katilim'=>0));
        }

    }

    // Seviye = 1 başkanlık,
    // Seviye = 0 üyelik,

    public function ilanYonet(int $id){

        if(null !== (DB::table('rollers')->where('ProjeId', '=', $id)->where('KullaniciId', '=', Auth::user()->id)->first())){
            $ilan = Projeler::where('id', $id)->first();
            $kullaniciRol = DB::table('rollers')->where('ProjeId', '=', $id)->where('KullaniciId', '=', Auth::user()->id)->first();

            if ($kullaniciRol->Seviye == 1) {

            $katilimcilar = roller::where('ProjeId', $id)->where('Seviye', 0)->orderBy('id', 'DESC')->paginate(5);

            foreach($katilimcilar as $kullanici){

                $roldengelenid = $kullanici->KullaniciId;
                $kullanici->isim = User::where('id', $roldengelenid)->first()->name;
                $kullanici->email = User::where('id', $roldengelenid)->first()->email;

            }

            return view('uyepaneli.ilanlarim.ilanyonet', array('ilan'=>$ilan,'kullaniciRol'=>$kullaniciRol,'katilimcilar'=>$katilimcilar));

            }else{
            return view('uyepaneli.ilanlarim.ilanyonet', array('ilan'=>$ilan,'kullaniciRol'=>$kullaniciRol));
            }


        }
        else{
            return back();
        }

    }

    public function takimdanCikar(int $ilanid, int $userid)
    {

        $kullainiciid = Auth::user()->id;

        if(null !== roller::where('ProjeId', $ilanid)->where('KullaniciId', $kullainiciid)->where('Seviye', 1)->first()){
            if(null !== (roller::where('ProjeId', $ilanid)->where('KullaniciId', $userid)->first())){

            roller::where('ProjeId', $ilanid)->where('KullaniciId', $userid)->first()->delete();

            $ilan = Projeler::where('id', $ilanid)->first();

            $ilan->decrement('UyeSayisi', 1);

            User::where('id', $userid)->first()->increment('kalankatilim', 1);

            return redirect()->route('ilanyonet', ['id' => $ilanid]);

            }else{
            return redirect()->route('homepage');
            }
        }else {
            return redirect()->route('homepage');
        }
    }

    public function Ayril(int $id){

        $kullainiciid = Auth::user()->id;
        if(null !== (roller::where('ProjeId', $id)->where('KullaniciId', $kullainiciid)->first())){

        $sil_kullanici_lv = roller::where('ProjeId', $id)->where('KullaniciId', $kullainiciid)->first()->Seviye;

        roller::where('ProjeId', $id)->where('KullaniciId', $kullainiciid)->first()->delete();

        $ilan = Projeler::where('id', $id)->first();

        $ilan->decrement('UyeSayisi', 1);

        User::where('id', Auth::user()->id)->first()->increment('kalankatilim', 1);

        $kalan_kullanicilar = roller::where('ProjeId', $id)->count();

        if(0 == $kalan_kullanicilar){
            Projeler::where('id', $id)->delete();
            return redirect()->route('kullaniciIlanlari');
        }
        else{
            if(1 == $sil_kullanici_lv){

                roller::where('ProjeId', $id)->first()->increment('Seviye', 1);

                return redirect()->route('kullaniciIlanlari');
            }else{
                return redirect()->route('kullaniciIlanlari');
            }
        }




        }
        else{
            return back();
        }

    }



    public function takimaKatil(int $id){

        if(5 > Projeler::where('id', $id)->first()->UyeSayisi){
        $ilan = Projeler::where('id', $id)->first();
        $kullainiciid = Auth::user()->id;

            if(null == (roller::where('ProjeId', $id)->where('KullaniciId', $kullainiciid)->first())){

                $yenirol = new roller();

                $yenirol -> ProjeId = $ilan->id;
                $yenirol -> KullaniciId = Auth::id();
                $yenirol -> Seviye = 0;

                $yenirol->save();

                User::where('id', Auth::user()->id)->first()->decrement('kalankatilim', 1);

                $ilan->increment('UyeSayisi', 1);

                return redirect()->route('kullaniciIlanlari');

            }
            else{
                return back();
            }


        }
        else{
            return back();
        }

    }





    public function takimSayfasi(int $id){

        $ilan = Projeler::where('id', $id)->first();


        if(null !== (DB::table('rollers')->where('ProjeId', '=', $id)->where('KullaniciId', '=', Auth::user()->id)->first())){

            $kullaniciRol = DB::table('rollers')->where('ProjeId', '=', $id)->where('KullaniciId', '=', Auth::user()->id)->first();

            $ilaninidsi = $ilan->id;

            $kullanicilar = roller::where('ProjeId', $ilaninidsi)->get();

            foreach($kullanicilar as $kullanici){

                $roldengelenid = $kullanici->KullaniciId;
                $kullanici->isim = User::where('id', $roldengelenid)->first()->name;
                $kullanici->email = User::where('id', $roldengelenid)->first()->email;

            }

            return view('uyepaneli.ilanlarim.takimsayfasi', array('ilan'=>$ilan,'kullaniciRol'=>$kullaniciRol,'kullanicilar'=> $kullanicilar));

        }
        else{
            return back();
        }

    }


}
