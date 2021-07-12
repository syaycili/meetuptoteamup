<!DOCTYPE html>
<html lang="TR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeler</title>
        <!-- MDB icon -->
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
        <!-- MDB -->
        <link rel="stylesheet" href="css/mdb.min.css" />
</head>
<body>


<div class="m-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
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
                <th scope="row">{{$key+1}}</th>
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

<form action="{{ url('proje/store') }}" method="POST" style="margin: auto; width: 500px">
    {{ csrf_field() }}

    <div class="form-outline mb-4">
        <input type="text" id="baslik" class="form-control" name="baslik"/>
        <label class="form-label" for="baslik">Proje Başlık</label>
    </div>

    <div class="form-outline mb-4">
        <textarea id="aciklama" class="form-control" name="aciklama"></textarea>
        <label class="form-label" for="aciklama">Proje Açıklama</label>
    </div>

    <div class="form-outline mb-4">
        <input id="kategori" class="form-control" name="kategori"/>
        <label class="form-label" for="kategori">Proje Kategorisi</label>
    </div>


    <input type="submit" class="btn btn-success" value="Gönder">



</form>




<script type="text/javascript" src="{{ asset('public/js/mdb.min.js') }}"></script>
</body>
</html>
