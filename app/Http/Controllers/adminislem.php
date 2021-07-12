<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Projeler;
use App\Models\roller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminislem extends Controller
{
  public function adminkontrol()
  {
    $adminMi = User::where('id', Auth::user()->id)->first()->adminMi;
    if($adminMi == 1){
        return 1;
    }else{
        return 0;
    }

  }

  public function adminpaneli()
  {

    if($this->adminkontrol() == 1){
        $iltist = Contact::orderBy('id', 'ASC')->paginate(5);
        return view('admin.panel',array('iletisimler'=>$iltist));
    }else{
        return redirect()->route('homepage');
    }

  }


  public function contactSil(int $id)
  {

    if($this->adminkontrol() == 1){
        Contact::where('id', $id)->delete();
        return back();
    }else{
        return redirect()->route('homepage');
    }

  }


  public function projeleriListele(){


    if($this->adminkontrol() == 1){

        $projeler = Projeler::orderBy('id', 'DESC')->paginate(6);
        return view('admin.projepaneli',array('projeler'=>$projeler));

    }else{
        return redirect()->route('homepage');
    }
    }


    public function uyeleriListele(){


        if($this->adminkontrol() == 1){

            $uyeler = User::orderBy('id', 'DESC')->paginate(10);;
            return view('admin.uyepaneli',array('uyeler'=>$uyeler));

        }else{
            return redirect()->route('homepage');
        }
        }

    public function uyeSil(int $id){

        if($this->adminkontrol() == 1){





            if(null !== (roller::where('KullaniciId', $id))){

                $roller = roller::where('KullaniciId', $id)->get();

                foreach ($roller as $rol) {

                $ilan = Projeler::where('id', $rol->ProjeId)->first();

                $sil_kullanici_lv = $rol->Seviye;

                $rol->delete();

                $ilan->decrement('UyeSayisi', 1);

                $kalan_kullanicilar = roller::where('ProjeId', $ilan->id)->count();

                if(0 == $kalan_kullanicilar){
                    Projeler::where('id', $id)->delete();
                }
                else{
                    if(1 == $sil_kullanici_lv){
                        roller::where('ProjeId', $ilan->id)->first()->increment('Seviye', 1);
                    }
                }
                }
            }

            User::where('id', $id)->delete();
            return back();


        }else{
            return redirect()->route('homepage');
        }


    }

}
