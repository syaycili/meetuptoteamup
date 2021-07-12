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

    @include('admin.adminnavbar', ['suankisayfa' => 1, 'bodymargin' => 80])


    <div style="padding: 50px 30px 75px 30px;" class="iletisimistekleri mx-5">



        <h1>İletişim istekleri <span style="font-size: 16px;" >(Eskiden yeniye sıralı)</span></h1><br>



@if ($iletisimler->isEmpty())


        <h6 class="my-3">Şimdilik hiçbir iletişim isteği bulunmamaktadır.</h6>


@else


        <table class="table table-striped" style="border: 1px solid rgb(143, 143, 143);">
            <thead>
              <tr>
                <th scope="col">İletişim ID</th>
                <th scope="col">İsim</th>
                <th scope="col">Email</th>
                <th scope="col">Telefon</th>
                <th scope="col">Konu</th>
                <th scope="col">Mesaj</th>
                <th scope="col">Tarih</th>
                <th scope="col">İşlemler</th>
              </tr>
            </thead>
            <tbody>


@foreach ($iletisimler as $iletisim)



              <tr>
                <td>{{$iletisim->id}}</td>
                <td>{{$iletisim->name}}</td>
                <td>{{$iletisim->email}}</td>
                <td>{{$iletisim->phone}}</td>
                <td>{{$iletisim->subject}}</td>
                <td>{{$iletisim->message}}</td>
                <td>{{$iletisim->created_at}}</td>
                <td><a href="{{ route('iletisimsil', ['id' => $iletisim->id]) }}" class="btn btn-danger">Sil</a></td>
              </tr>

@endforeach




            </tbody>
          </table>





          {{ $iletisimler->links() }}
@endif
    </div>





</body>
</html>
