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
    @include('admin.adminnavbar', ['suankisayfa' => 3, 'bodymargin' => 80])

<div class="m-5">
    <table class="table">
        <thead>
          <tr>

            <th scope="col">Üye ID</th>
            <th scope="col">İsim</th>
            <th scope="col">E-mail</th>
            <th scope="col">Kalan Proje Açma Hakkı</th>
            <th scope="col">Kayıt Tarihi</th>
            <th scope="col">Sil</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $uyeler as $uye )

            <tr>

                <td>{{$uye->id}}</td>
                <td>{{$uye->name}}</td>
                <td>{{$uye->email}}</td>
                <td>{{$uye->kalankatilim}}</td>
                <td>{{$uye->created_at}}</td>
                <td><a href="{{ route('uye_delete', ['id' => $uye->id]) }}" class="btn btn-sm btn-danger">Sil</a></td>
            </tr>

            @endforeach

        </tbody>
      </table>
</div>

<div class="d-flex justify-content-center">
    {{ $uyeler->links() }}
</div>



<script type="text/javascript" src="{{ asset('public/js/mdb.min.js') }}"></script>
</body>
</html>
