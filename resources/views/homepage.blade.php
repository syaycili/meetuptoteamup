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
      <h1 class="display-4 fw-bold">Takım Arkadaşlarınızı Bulun</h1>
      <div class="col-lg-6 mx-auto">
        <p style="max-width: 800px; margin: 20px auto 20px auto;" class="lead mb-4">Tamamen ücretsiz bir şekilde istediğiniz ilgi alanlarından takım arkadaşlarınızı kolayca bulun.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
          <a href="{{ route('ilansayfasi') }}" type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Takım İlanları</a>

            @auth
            <a href="{{ route('dashboard') }}" type="button" class="btn btn-outline-secondary btn-lg px-4">Üye Paneli</a>
            @else
            <a href="{{ route('register') }}" type="button" class="btn btn-outline-secondary btn-lg px-4">Kayıt Ol</a>
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
              <h2>Kendinize Uygun Takımınızı Oluşturun</h2>
              <p>Aradığınız özellikte takım arkadaşları bulup projenizi geliştirebilirsiniz. Takım arkadaşları bulmak için ilan verebilir, verilen ilanları gözden geçirebilir, takımınızı genişletmek için yeni ilanlar oluşturabilirsiniz.</p>

            </div><!-- /.col-lg-4 -->


            <div class="col-lg-4 minialan">
              <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="ozellikler_resim">
              <h2>Hızlıca Takım Arkadaşlarınızı Bulun</h2>
              <p>Gözünüze çarpan bir takım ilanı bulduğunuzda anında sadece bir tık ile istediğiniz takımın içerisinde yer alabilirsiniz. Aynı şekilde, bir takım ilanı verdiğinizde gelen hızlı başvurular ile anında bir takımınız oluşabilir.</p>

            </div><!-- /.col-lg-4 -->


            <div class="col-lg-4 minialan">
              <img src="https://images.pexels.com/photos/461049/pexels-photo-461049.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="ozellikler_resim">
              <h2>İstediğiniz İlgi Alanlarından İnsanlarla Tanışın</h2>
              <p>Birçok kategoride ilanlar vererek oluşturduğunuz takımla istediğiniz alanda çalışabilirsiniz. Takımlarınızla akademik, sosyal, sanatsal ve daha birçok alanda faaliyet gösterebilirsiniz.</p>

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
        <h2 class="featurette-heading">Destek <span class="text-muted">Kaynağı</span></h2>
        <p class="lead">Takım üyeleri birbirlerine duygusal destek sağlayabilir çünkü işi tamamlama konusunda birbirinizi daha iyi anlayabilirsiniz. Birlikteliğin ve yalnız olmadığınız duygusunun vereceği güçle projenize daha sıkı sarılabilirsiniz.</p>
      </div>
      <div class="col-md-5">
        <img src="{{ asset('img/homepage_fotolar/1.svg') }}" class="feature-photo">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Fikir <span class="text-muted">Alışverişi</span></h2>
        <p class="lead">Takım arkadaşlarınızla farklı bakış açılarınızı paylaşabileceğiniz bir ortam oluşturur. Hem birbirinizden öğreneceğiniz hem de faydaları bir tartışma ortamından edinebileceğiniz fikirleri ortaya koyma imkanı sağlar.
          <br>
          <cite>"Her dahinin arkasında bir ekip vardır, insanlar birbirlerinin bilgi ve becerilerini kullandığında, pratik ve faydalı çözümler üretebilirler."</cite><br>
          Murphy</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{ asset('img/homepage_fotolar/2.svg') }}" class="feature-photo" >
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Etkileşim</h2>
        <p class="lead">Tanışacağınız yeni ve paylaşacağınız farklı çalışma ortamlarıyla Türkiye çapında lise öğrencilerini tanıma şansı elderek yeni arkadaşlar edinebilirsiniz ve çevrenizi genişletebilirsiniz.</p>
      </div>
      <div class="col-md-5">
        <img src="{{ asset('img/homepage_fotolar/3.svg') }}" class="feature-photo">
      </div>
    </div>


    <hr class="featurette-divider">













    <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Zaman <span class="text-muted">Tasarrufu</span></h2>
          <p class="lead">Takım çalışması sayesinde verimliliği artırırken harcanan zamanı azaltabilirsiniz. Takım arkadaşlarınızla işleri bölüşerek ve eş zamanlı çalışmalar yürüterek projenizi hızlıca hayata geçirebilirsiniz.</p>
        </div>
        <div class="col-md-5" style="padding-right: 50px;">
          <img src="{{ asset('img/homepage_fotolar/baslik4.svg') }}" class="feature-photo" >
        </div>
      </div>

      <hr class="featurette-divider">



      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Yaratıcılık</h2>
          <p class="lead">Farklı bakış açılarına sahip insanlar ile takım olarak beyin fırtınalarında bir araya geldiğinizde, yenilikçi fikirler bir anda ortaya çıkabilir. En yaratıcı çözümler ekip üyelerinin rahatça sorular sormasına, fikirler önermesine ve yapıcı eleştiri almasına olanak tanındığı zaman ortaya çıkabilir.</p>
        </div>
        <div class="col-md-5 ">
          <img src="{{ asset('img/homepage_fotolar/baslik5.svg') }}" class="feature-photo">
        </div>
      </div>


      <hr class="featurette-divider">




      <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Mutluluk</h2>
            <p class="lead">Dürüst geri bildirim, karşılıklı saygı ve kişisel açıklık teşvik edildiğinde ekip üyelerinin çalışmayı sürdürürken daha mutlu olması kaçınılmaz bir durumdur. İngiltere'deki Warwick Üniversitesi'nde yapılan araştırma, mutlu çalışanların mutsuz çalışanlardan yüzde 20'ye kadar daha üretken olduğunu gösteriyor.
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
