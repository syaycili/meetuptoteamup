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
            <link rel="stylesheet" href="{{ asset('public/css/mdb.min.css') }}">
</head>
<body>
    <style>
        .ana_alan{
            padding-top: 10px;
            margin-top: 2%;
        }

        .kisim{

            margin-bottom: 20px;
        }
        .altkisim{
text-align: center;
margin-top: 20px;
}
    </style>

    @include('uyepaneli.navbar', ['suankisayfa' => 2, 'bodymargin' => 100])

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('kullaniciIlanlari') }}">Takımlarım</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$ilan->ProjeBaslik}}</li>
            </ol>
          </nav>

        <div class="icerik">
            <h1><b>{{$ilan->ProjeBaslik}}</b> Takım Sayfası</h1>



            <div class="ana_alan">
                <div class="row">

                  <div class="kisim col-md-4">

                        @foreach ( $kullanicilar as $kullanici )

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">{{$kullanici->isim}}</div>
                              {{$kullanici->email}}
                            </div>
                            <span class="badge bg-primary rounded-pill">

                                @switch($kullanici->Seviye)
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
                                {{$seviyeismi}}
                            </span>
                          </li>

                        @endforeach

























<!-- Button trigger modal -->
<button
style="width: 100%; margin-top: 15px"
  type="button"
  class="btn btn-primary"
  data-mdb-toggle="modal"
  data-mdb-target="#exampleModal"

>
İlanı Paylaş
</button><br>

<!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">İlanı Paylaş</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">





<div class="mb-3" style="border: 1px solid black; text-align: left; border-radius: 99px; padding-left: 10px;">
    {{ route('ilan_detay', ['id'=>$ilan->id]) }}
</div>


<div class="text-center">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.meetuptoteamup.com/ilanlar/Detay/{{$ilan->id}}" type="button" class="btn btn-primary btn-lg btn-floating">
            <i id="sosyalmedyaikonlari" class="fab fa-facebook"></i>
          </a>

        <a target="_blank" href="https://twitter.com/intent/tweet?url=https://www.meetuptoteamup.com/ilanlar/Detay/{{$ilan->id}}&text=MeetUptoTeamUp%20ile%20kurdu%C4%9Fum%20tak%C4%B1m%C4%B1ma%20kat%C4%B1l%C4%B1n!" type="button" class="btn btn-primary btn-lg btn-floating">
            <i id="sosyalmedyaikonlari" class="fab fa-twitter"></i>
          </a>

        <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.meetuptoteamup.com/ilanlar/Detay/{{$ilan->id}}" type="button" class="btn btn-primary btn-lg btn-floating">
            <i id="sosyalmedyaikonlari" class="fab fa-linkedin"></i>
          </a>

          <a target="_blank" href="mailto:info@example.com?&subject=&cc=&bcc=&body=https://www.meetuptoteamup.com/ilanlar/Detay/{{$ilan->id}}%0AMeetUptoTeamUp%20ile%20kurdu%C4%9Fum%20tak%C4%B1m%C4%B1ma%20kat%C4%B1l%C4%B1n!" type="button" class="btn btn-primary btn-lg btn-floating">
            <i id="sosyalmedyaikonlari" class="far fa-envelope"></i>
          </a>
        </div>







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">
          Kapat
        </button>

      </div>
    </div>
  </div>
</div>







<!-- Button trigger modal -->
<button
style="width: 100%; margin-top: 15px"
type="button"
class="btn btn-primary"
data-mdb-toggle="modal"
data-mdb-target="#detaylarmodal"
>
Detaylar
</button>

<!-- Modal -->
<div
  class="modal fade"
  id="detaylarmodal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detaylar</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">




        <div class="altkisim">
            <p>Oluşturulma tarihi: {{$ilan->created_at}}</p>
            <p>Oluşturan kullanıcı: {{$ilan->Sahip}}</p>
            <p>Katılan üye sayısı: {{$ilan->UyeSayisi}} / 5</p>
          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">
          Kapat
        </button>
      </div>
    </div>
  </div>
</div>













                  </div>



                  <style>


                    /* width */
                    .customscrollbar::-webkit-scrollbar {
                      width: 10px;

                    }

                    /* Track */
                    .customscrollbar::-webkit-scrollbar-track {
                      background: #f1f1f1;
                    }

                    /* Handle */
                    .customscrollbar::-webkit-scrollbar-thumb {
                      background: #888;
                      border-radius: 999px;
                    }

                    /* Handle on hover */
                    .customscrollbar::-webkit-scrollbar-thumb:hover {
                      background: #555;
                    }


                    </style>


                  <div class="kisim col-md-8">
                    <div>
                        <div style="max-width: 700px; margin: auto;">
                            <div id="app">
                                <chat-component aktifuser="{{ Auth::user()->id }}" deneme="{{$ilan->id}}"></chat-component>
                            </div>
                            <script defer src="{{ asset('public/js/app.js')}}"></script>
                            </div>
                    </div>
                  </div>

                </div>
              </div>

        </div>


    </div>
<br>
    @include('parts.footer')
</body>
</html>

