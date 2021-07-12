<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>İlanlarım</title>
            <!-- MDB icon -->
            <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
            <!-- Google Fonts Roboto -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
            <!-- MDB -->
            <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
</head>
<body>
    @include('uyepaneli.navbar', ['suankisayfa' => 2, 'bodymargin' => 100])

    @switch($kullaniciRol->Seviye)
        @case(1)
        @php
            $seviyeismi = 'Başkan';
        @endphp
            @break
        @case(0)
        @php
            $seviyeismi = 'Üye';
        @endphp
            @break
        @default
        @php
            $seviyeismi = 'Tanımlanamadı';
        @endphp
    @endswitch







<!-- Modal 1 -->
<div
  class="modal fade"
  id="modal1"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Emin misin?</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">Takımdan ayrılmak istediğine emin misin? Bu işlem geri alınamaz!</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">
          İptal Et
        </button>
        <a href="{{ route('ayril', ['id' => $ilan->id]) }}" type="button" class="btn btn-danger">Ayrıl</a>
      </div>
    </div>
  </div>
</div>





















    <div class="container">
        <h2>Rol: {{$seviyeismi}}</h2>
        <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#modal1">Ayrıl</button>
        <a href="{{ route('kullaniciIlanlari')}}" class="btn btn-primary">Geri Dön</a>
    </div>
    <br>

    @if ($kullaniciRol->Seviye == 1)
    <div class="container shadow-2 border">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">İsim</th>
                <th scope="col">E-Mail</th>
                <th scope="col">İşlem</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($katilimcilar as $katilimci)





<!-- Modal 2 -->
<div
  class="modal fade"
  id="katilimcimodal{{$katilimci->id}}"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$katilimci->isim}} İsimli Üyeyi Takımdan Çıkar</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">"{{$katilimci->isim}}" isimli, takıma "{{$katilimci->created_at}}" tarihinde katılan, "{{$katilimci->email}}" email adresine sahip üyeyi çıkarmak istediğinize emin misiniz? Bu işlem geri alınamaz!</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">
          İptal Et
        </button>
        <a href="{{ route('takimdanCikar', ['ilanid'=>$ilan->id, 'userid'=>$katilimci->KullaniciId]) }}" type="button" class="btn btn-danger">Çıkar</a>
      </div>
    </div>
  </div>
</div>





              <tr>
                <th scope="row">1</th>
                <td>{{$katilimci->isim}}</td>
                <td>{{$katilimci->email}}</td>
                <td><button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#katilimcimodal{{$katilimci->id}}">Çıkar</button></td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
    @endif
</body>
</html>

