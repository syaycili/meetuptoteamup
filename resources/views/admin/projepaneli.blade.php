<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Paneli</title>
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
    @include('admin.adminnavbar', ['suankisayfa' => 2, 'bodymargin' => 80])

<div class="m-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Proje ID</th>
            <th scope="col">Proje Başlık</th>
            <th scope="col">Proje Kategori</th>
            <th scope="col">Proje Açıklaması</th>
            <th scope="col">Sahip</th>
            <th scope="col">Üye Sayısı</th>
            <th scope="col">Sil</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $projeler as $key => $proje )

            <tr>
                <td>{{$proje->id}}</td>
                <td>{{$proje->ProjeBaslik}}</td>
                <td>{{$proje->ProjeKategori}}</td>
                <td>{{$proje->ProjeAciklama}}</td>
                <td>{{$proje->Sahip}}</td>
                <td>{{$proje->UyeSayisi}}</td>
                <td><a href="{{ route('proje_delete', ['id' => $proje->id]) }}" class="btn btn-sm btn-danger">Sil</a></td>
            </tr>

            @endforeach

        </tbody>
      </table>
</div>

<div class="d-flex justify-content-center">
    {{ $projeler->links() }}
</div>



<script type="text/javascript" src="{{ asset('public/js/mdb.min.js') }}"></script>
</body>
</html>
