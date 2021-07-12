<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>İlan Oluştur</title>
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
    @include('uyepaneli.navbar', ['suankisayfa' => 4, 'bodymargin' => 100])

    <style>
        .govde{
            max-width: 800px;
            margin: auto;
        }
        .baslik{
            margin: 30px 0px;
        }
        .form-select:focus{
            outline: none !important;
            box-shadow: none;
        }
    </style>

    <div class="container">
        <div class="govde">
            <h3 class="baslik">Yeni takım ilanı oluşturun</h3>
            @if ($kalankatilim > 0)


            <form action="{{ url('proje/store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-outline mb-4">
                    <input type="text" id="baslik" class="form-control" name="baslik" required/>
                    <label class="form-label" for="baslik">Başlık</label>
                </div>

                <div class="form-outline mb-4">
                    <textarea id="aciklama" class="form-control" name="aciklama" required></textarea>
                    <label class="form-label" for="aciklama">Açıklama</label>
                </div>

                <div class="form-outline mb-4">
                    <select name="kategori" class="form-select" id="kategori" required>
                        <option value="" disabled selected hidden>Proje Kategorisi</option>


                        @foreach ($kategoriler as $key => $kategori )

                        <option value="{{$kategori}}">{{$kategori}}</option>
                        @endforeach

                    </select>
                </div>


                <div class="my-4">
                    <p class="text-warning">Takım oluşturmanız halinde takıma katılma haklarınızdan birini kullanmış olursunuz!</p>

                    <p>Kalan takıma katılma hakkı: {{$kalankatilim}} </p>
                    <div class="progress" style="height: 30px; width: 100%;">
                        <div
                          class="progress-bar bg-secondary"
                          role="progressbar"
                          style="width: {{100 - $kalankatilim * 10}}%"
                          aria-valuenow="{{100 - $kalankatilim * 10}}"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                          {{100 - $kalankatilim * 10}}%
                        </div>
                      </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Oluştur</button>
              </form>

            @else

            <p>Üzgünüz, maalesef takım sınırına ulaştınız. Yeni takım açabilmek için mevcut takımlarınızdan çıkabilir veya bize <a href="{{ route('iletisim') }}">ulaşabilirsiniz</a>.</p>

            <div class="my-5">

                <p>Kalan takıma katılma hakkı: {{$kalankatilim}} </p>
                <div class="progress my-1" style="height: 30px; width: 40%;">
                    <div
                      class="progress-bar bg-danger"
                      role="progressbar"
                      style="width: {{100 - $kalankatilim * 10}}%"
                      aria-valuenow="{{100 - $kalankatilim * 10}}"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      {{100 - $kalankatilim * 10}}%
                    </div>
                  </div>
            </div>

            @endif





        </div>
    </div>

    @include('parts.footer')

    <script type="text/javascript" src="{{ asset('public/js/mdb.min.js') }}"></script>
</body>
</html>



