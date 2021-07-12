<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Üye Paneli</title>
            <!-- MDB icon -->
            <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
            <!-- Google Fonts Roboto -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
            <!-- MDB -->
            <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/ilanlar.css') }}">
</head>
<body>
    @include('uyepaneli.navbar', ['suankisayfa' => 1, 'bodymargin' => 80])

    <style>
        body{
        background-image: url({{ asset('img/dashboard_bg_2.jpg') }});
        background-repeat: no-repeat;
           background-size: cover;
        }



        .govde{
            padding: 100px 15px;
        }

        .baslik{
            margin-bottom: 15px;
        }
    </style>

    <div class="container">
        <div class="govde text-light">
            <h2 class="baslik">Merhaba <b>{{Auth::user()->name}} &#128075;</b></h2>

            <a href="{{ route('kullaniciIlanlari') }}" type="button" class="btn btn-primary">Takımlarım</a>
            <a href="{{ route('yeniilanolustur') }}" type="button" class="btn btn-primary">Yeni İlan Oluştur</a>

            <div class="my-5">

                <p>Kalan takıma katılma hakkı: {{$kalanhak}} </p>
                <div class="progress my-2" style="height: 30px; width: 40%;">
                    <div
                      class="progress-bar bg-info"
                      role="progressbar"
                      style="width: {{100 - $kalanhak * 10}}%"
                      aria-valuenow="{{100 - $kalanhak * 10}}"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      {{100 - $kalanhak * 10}}%
                    </div>
                  </div>
            </div>


        </div>
    </div>


    @include('parts.footer')


</body>
</html>
