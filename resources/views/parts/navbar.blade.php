<style>

@import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

body{
    margin-top: {{$bodymargin}}px;
  }

.navsolbuton{
  margin-right: 10px;

}

</style>


    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="padding-right: 20px; padding-left: 20px;">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}" style="margin-right: 25px; font-family: 'Fredoka One', cursive;"><img src="{{ asset('img/logo.svg') }}" style="height: 40px; padding-bottom:2px;"> MeetUp2TeamUp</a>
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a @if($suankisayfa == 1) href="#" class="nav-link active" aria-current="page" @else href="{{ route('homepage') }}"  class="nav-link"  @endif  style="margin-right: 15px;">Anasayfa</a>
            </li>

            <li class="nav-item">
              <a @if($suankisayfa == 3) href="{{ route('ilansayfasi') }}"  class="nav-link active" aria-current="page"  @else href="{{ route('ilansayfasi') }}" class="nav-link" @endif  style="margin-right: 15px;">Takım İlanları</a>
            </li>
            <li class="nav-item">
              <a  @if($suankisayfa == 4) href="{{ route('iletisim') }}"  class="nav-link active" aria-current="page"  @else href="{{ route('iletisim') }}" class="nav-link" @endif  style="margin-right: 15px;">İletişim</a>
            </li>
          </ul>


        @if (Route::has('login'))
              @auth
              <a href="{{ url('/dashboard') }}" type="button" class="btn btn-primary btn-rounded navsolbuton">Üye Paneli</a>
              @else
              <a href="{{ route('login') }}" type="button" class="btn btn-outline-primary btn-rounded navsolbuton" data-mdb-ripple-color="dark">Giriş Yap</a>
                  @if (Route::has('register'))
                  <a href="{{ route('register') }}" type="button" class="btn btn-primary btn-rounded navsolbuton">Üye Ol</a>
                  @endif
              @endauth
        @endif





        </div>
      </div>
    </nav>


