@include('ilanlar.ilanlar_head')

<body>

@include('parts.navbar', ['suankisayfa' => 3, 'bodymargin' => 100])

<style>

.ilanalani{
    display: flex;
}

.select{
margin: 8px 0px 8px 0px;
 width: 150px;
 border: 1px solid black;
 border-radius: 999px;
padding-left: 5px;
 height: 30px;
}

.select:focus{
outline: none;
}

.card{
    width: 500px;
    height: 350px;
}
.card-text{
    max-height: 65px;
}
</style>




<div class="row ilanalani">




    <div class="col-xl-2 yanalan">









        <div class="accordion mb-5" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button"
                  type="button"
                  data-mdb-toggle="collapse"
                  data-mdb-target="#collapseOne"

                  aria-controls="collapseOne"
                >
                  Filtrele
                </button>
              </h2>
              <div
                id="collapseOne"

              @if ($SeciliKategori == "Tamamı")
              class="accordion-collapse collapse"
              @else
              class="accordion-collapse collapse-show"
              @endif


                aria-labelledby="headingOne"
                data-mdb-parent="#accordionExample"
              >
                <div class="accordion-body">


                    <h6>Göster: {{$SeciliKategori}}</h6>

                    <hr>
                            <div class="dropdown mb-2">
                                <a
                                  class="btn btn-primary dropdown-toggle"
                                  href="#"
                                  role="button"
                                  id="dropdownMenuLink"
                                  data-mdb-toggle="dropdown"
                                  aria-expanded="false"
                                >
                                    Kategoriler
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <li><a class="dropdown-item" href="{{ route('ilansayfasi') }}">Tamamı</a></li>
                                    @foreach ($kategoriler as $kategori)
                                    <li><a class="dropdown-item" href="{{ route('ilan_filtre', ['kategori' => $kategori]) }}">{{$kategori}}</a></li>
                                    @endforeach
                                </ul>
                              </div>




                </div>
              </div>
            </div>
          </div>












</div>





    <div class="col-xl-10 container">
        <div class="row">

        @foreach ( $ilanlar as $key => $ilan )

          <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">{{$ilan->Sahip}}</div>
                <div class="card-body">
                  <h5 class="card-title">{{$ilan->ProjeBaslik}}</h5>
                  <p class="card-text">
                    {{$ilan->ProjeAciklama}}

                  </p>

                  <a href="{{ route('ilan_detay', ['id' => $ilan->id]) }}" class="btn btn-success">İNCELE</a>
                  <br><br><span class="">Kategori: {{$ilan->ProjeKategori}}</span>
                </div>

                @if (5 > $ilan->UyeSayisi)

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

                @else

                <div class="card-footer text-muted">
                    <div class="progress" style="height: 20px">
                        <div
                          class="progress-bar bg-danger"
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

                @endif




              </div>
          </div>


        @endforeach

        </div>
      </div>

<div class="d-flex justify-content-center">
    {{ $ilanlar->links() }}
</div>

</div>



<br>
    @include('parts.footer')


<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
</body>
</html>
