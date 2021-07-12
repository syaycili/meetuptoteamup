@include('ilanlar.ilanlar_head')
<body>
@include('parts.navbar', ['suankisayfa' => 3, 'bodymargin' => 90])

<style>

.islembtn{
    width: 80%;
    margin: 10px auto;
    max-width: 400px;

}

#sosyalmedyaikonlari{
    font-size: 25px;
}

</style>


<script>
    function goBack() {
      window.history.back();
    }
</script>



    <div class="container mt-2">
        <div class="row">


          <div class="col-sm-6 mt-3">

            <div class="text-left" style="width: 100%;padding-left: 20px">


            <h1>{{$ilan->ProjeBaslik}}</h1>
            <p>{{$ilan->ProjeAciklama}}</p>
            <p>Kategori: {{$ilan->ProjeKategori}}</p>
            <p class="text-primary">İlanı veren: {{$ilan->Sahip}}</p>
            <button onclick="goBack()" class="btn btn-primary mt-1">Geri Dön</button>

            </div>

          </div>



          <div class="col-sm-6 mt-3">
            <div class="text-center" style="width: 100%;">
                <h3>İşlemler</h3>
                @if ($katilim == 1)
                <a href="{{ route('takimsayfasi', ['id' => $ilan->id]) }}" type="button" class="islembtn btn btn-secondary">Takım Sayfsına Git</a>
                @else

                @if (5 > $ilan->UyeSayisi)

                <a href="{{ route('takima_katil', ['id' => $ilan->id]) }}" type="button" class="islembtn btn btn-secondary">Katıl</a>
                @auth
                <div class="mt-4" style="width: 60%; margin: auto;">
                    <p class="text-warning mt-4">Takıma katılmanız halinde takıma katılma haklarınızdan birini kullanmış olursunuz!</p>

                    <p>Kalan takıma katılma hakkı: {{$kalankatilim}} </p>
                </div>
                @endauth
                @else

                <button type="button" class="islembtn btn btn-secondary disabled">Takım Dolu</button>

                @endif


                @endif

                <div class="islembtn text-end">













<!-- Button trigger modal -->
<button
style="width: 100%;"
  type="button"
  class="btn btn-primary islembtn"
  data-mdb-toggle="modal"
  data-mdb-target="#exampleModal"

>
  Paylaş
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
    {{Request::url()}}
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














<br>






<a href="{{ route('iletisim') }}" type="button" class="btn btn-danger btn-sm btn-floating">
    <i class="fas fa-flag"></i>

 </a>






                </div>
                </div>
          </div>




        </div>
      </div>




</body>
<br><br>

<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
@include('parts.footer')
</html>
