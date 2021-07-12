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


<style>
    .card{
        margin-bottom: 50px;
        width: 100%;
    }
    .baslik{
        margin: 30px 0px;
    }
    .col-4{
        text-align: right;
    }
</style>

<div class="container">
    <h2 class="baslik">Takımlarım</h2>
    <div class="govde">
        @foreach ( $ilanlar as $key => $ilan )
        <div class="card">
            <div class="card-header">{{$ilan->Sahip}}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8"><h5 class="card-title">{{$ilan->ProjeBaslik}}</h5></div>
                    <div class="col-4"><a href="{{ route('takimsayfasi', ['id' => $ilan->id]) }}" type="button" class="btn btn-info mx-3">Takım Sayfası</a><a href="{{ route('ilanyonet', ['id' => $ilan->id]) }}" type="button" class="btn btn-warning">Yönet</a></div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="progress" style="height: 20px">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: {{$ilan->UyeSayisi*20}}%"
                      aria-valuenow="{{$ilan->UyeSayisi}}"
                      aria-valuemin="1"
                      aria-valuemax="5"
                    >
                    {{$ilan->UyeSayisi*20}}%
                    </div>
                  </div>

            </div>
          </div>
          @endforeach

          @if (null == $ilanlar)

          <p>Henüz bir takıma katılmamışsınız!</p>

          @endif
    </div>
</div>
<br><br>
@include('parts.footer')
</body>
</html>

