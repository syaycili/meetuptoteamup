<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>MeetUp2TeamUp</title>
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



<style>

.feature-photo{
  width: 100%;
  height: auto;

}

.ozellikler_resim{
  object-fit: cover;
  width: 140px;
  height: 140px;
  border-radius: 999px;

}





.marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}
.marketing h2 {
  font-weight: 400;
}
/* rtl:begin:ignore */
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}
/* rtl:end:ignore */


/* Featurettes
------------------------- */

.featurette-divider {
  margin: 5rem 0; /* Space out the Bootstrap <hr> more */
}

/* Thin out the marketing headings */
.featurette-heading {
  font-weight: 300;
  line-height: 1;
  /* rtl:remove */
  letter-spacing: -.05rem;
  margin-bottom: 15px;
}


/* RESPONSIVE CSS
-------------------------------------------------- */

@media (min-width: 40em) {
  /* Bump up size of carousel content */
  .carousel-caption p {
    margin-bottom: 1.25rem;
    font-size: 1.25rem;
    line-height: 1.4;
  }

  .featurette-heading {
    font-size: 50px;
  }
}

@media (min-width: 62em) {
  .featurette-heading {
    margin-top: 7rem;
  }
}

.minialan{
    max-width: 23rem;
    margin: auto;
    color: white;
}

.minialan h2{
    margin: 1.5rem 0rem 1rem 0rem
}

</style>





@include('parts.navbar', ['suankisayfa' => 1, 'bodymargin' => 80])





    <div class="px-4 pt-4 my-1 text-center border-bottom">
      <h1 class="display-4 fw-bold">Tak??m Arkada??lar??n??z?? Bulun</h1>
      <div class="col-lg-6 mx-auto">
        <p style="max-width: 800px; margin: 20px auto 20px auto;" class="lead mb-4">Tamamen ??cretsiz bir ??ekilde istedi??iniz ilgi alanlar??ndan tak??m arkada??lar??n??z?? kolayca bulun.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
          <a href="{{ route('ilansayfasi') }}" type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Tak??m ??lanlar??</a>

            @auth
            <a href="{{ route('dashboard') }}" type="button" class="btn btn-outline-secondary btn-lg px-4">??ye Paneli</a>
            @else
            <a href="{{ route('register') }}" type="button" class="btn btn-outline-secondary btn-lg px-4">Kay??t Ol</a>
            @endauth

        </div>
      </div>
      <div class="overflow-hidden" style="max-height: 50vh;">
        <div class="container px-5">
          <img src="{{ asset('img/homepage_fotolar/team.svg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="first image" width="700" height="500" loading="lazy">
        </div>
      </div>
    </div>












    <div class="bg-dark text-secondary px-4 py-5 text-center">
      <div class="py-4">




        <div class="row">


            <div class="col-lg-4 minialan">
              <img src="https://images.pexels.com/photos/3184423/pexels-photo-3184423.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="ozellikler_resim">
              <h2>Kendinize Uygun Tak??m??n??z?? Olu??turun</h2>
              <p>Arad??????n??z ??zellikte tak??m arkada??lar?? bulup projenizi geli??tirebilirsiniz. Tak??m arkada??lar?? bulmak i??in ilan verebilir, verilen ilanlar?? g??zden ge??irebilir, tak??m??n??z?? geni??letmek i??in yeni ilanlar olu??turabilirsiniz.</p>

            </div><!-- /.col-lg-4 -->


            <div class="col-lg-4 minialan">
              <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="ozellikler_resim">
              <h2>H??zl??ca Tak??m Arkada??lar??n??z?? Bulun</h2>
              <p>G??z??n??ze ??arpan bir tak??m ilan?? buldu??unuzda an??nda sadece bir t??k ile istedi??iniz tak??m??n i??erisinde yer alabilirsiniz. Ayn?? ??ekilde, bir tak??m ilan?? verdi??inizde gelen h??zl?? ba??vurular ile an??nda bir tak??m??n??z olu??abilir.</p>

            </div><!-- /.col-lg-4 -->


            <div class="col-lg-4 minialan">
              <img src="https://images.pexels.com/photos/461049/pexels-photo-461049.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="ozellikler_resim">
              <h2>??stedi??iniz ??lgi Alanlar??ndan ??nsanlarla Tan??????n</h2>
              <p>Bir??ok kategoride ilanlar vererek olu??turdu??unuz tak??mla istedi??iniz alanda ??al????abilirsiniz. Tak??mlar??n??zla akademik, sosyal, sanatsal ve daha bir??ok alanda faaliyet g??sterebilirsiniz.</p>

            </div><!-- /.col-lg-4 -->



          </div>




      </div>
    </div>











    <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- START THE FEATURETTES -->
    <hr class="featurette-divider" style="color: transparent;">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Destek <span class="text-muted">Kayna????</span></h2>
        <p class="lead">Tak??m ??yeleri birbirlerine duygusal destek sa??layabilir ????nk?? i??i tamamlama konusunda birbirinizi daha iyi anlayabilirsiniz. Birlikteli??in ve yaln??z olmad??????n??z duygusunun verece??i g????le projenize daha s??k?? sar??labilirsiniz.</p>
      </div>
      <div class="col-md-5">
        <img src="{{ asset('img/homepage_fotolar/1.svg') }}" class="feature-photo">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Fikir <span class="text-muted">Al????veri??i</span></h2>
        <p class="lead">Tak??m arkada??lar??n??zla farkl?? bak???? a????lar??n??z?? payla??abilece??iniz bir ortam olu??turur. Hem birbirinizden ????renece??iniz hem de faydalar?? bir tart????ma ortam??ndan edinebilece??iniz fikirleri ortaya koyma imkan?? sa??lar.
          <br>
          <cite>"Her dahinin arkas??nda bir ekip vard??r, insanlar birbirlerinin bilgi ve becerilerini kulland??????nda, pratik ve faydal?? ????z??mler ??retebilirler."</cite><br>
          Murphy</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{ asset('img/homepage_fotolar/2.svg') }}" class="feature-photo" >
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Etkile??im</h2>
        <p class="lead">Tan????aca????n??z yeni ve payla??aca????n??z farkl?? ??al????ma ortamlar??yla T??rkiye ??ap??nda lise ????rencilerini tan??ma ??ans?? elderek yeni arkada??lar edinebilirsiniz ve ??evrenizi geni??letebilirsiniz.</p>
      </div>
      <div class="col-md-5">
        <img src="{{ asset('img/homepage_fotolar/3.svg') }}" class="feature-photo">
      </div>
    </div>


    <hr class="featurette-divider">













    <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Zaman <span class="text-muted">Tasarrufu</span></h2>
          <p class="lead">Tak??m ??al????mas?? sayesinde verimlili??i art??r??rken harcanan zaman?? azaltabilirsiniz. Tak??m arkada??lar??n??zla i??leri b??l????erek ve e?? zamanl?? ??al????malar y??r??terek projenizi h??zl??ca hayata ge??irebilirsiniz.</p>
        </div>
        <div class="col-md-5" style="padding-right: 50px;">
          <img src="{{ asset('img/homepage_fotolar/baslik4.svg') }}" class="feature-photo" >
        </div>
      </div>

      <hr class="featurette-divider">



      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Yarat??c??l??k</h2>
          <p class="lead">Farkl?? bak???? a????lar??na sahip insanlar ile tak??m olarak beyin f??rt??nalar??nda bir araya geldi??inizde, yenilik??i fikirler bir anda ortaya ????kabilir. En yarat??c?? ????z??mler ekip ??yelerinin rahat??a sorular sormas??na, fikirler ??nermesine ve yap??c?? ele??tiri almas??na olanak tan??nd?????? zaman ortaya ????kabilir.</p>
        </div>
        <div class="col-md-5 ">
          <img src="{{ asset('img/homepage_fotolar/baslik5.svg') }}" class="feature-photo">
        </div>
      </div>


      <hr class="featurette-divider">




      <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Mutluluk</h2>
            <p class="lead">D??r??st geri bildirim, kar????l??kl?? sayg?? ve ki??isel a????kl??k te??vik edildi??inde ekip ??yelerinin ??al????may?? s??rd??r??rken daha mutlu olmas?? ka????n??lmaz bir durumdur. ??ngiltere'deki Warwick ??niversitesi'nde yap??lan ara??t??rma, mutlu ??al????anlar??n mutsuz ??al????anlardan y??zde 20'ye kadar daha ??retken oldu??unu g??steriyor.
            </p>
          </div>
          <div class="col-md-5 order-md-1"  style="padding-right: 50px;">
            <img src="{{ asset('img/homepage_fotolar/baslik6.svg') }}" class="feature-photo" >
          </div>
        </div>














    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

  @include('parts.footer')

  <script type="text/javascript" src="{{ asset('public/js/mdb.min.js') }}"></script>
  </body>
</html>
