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
            <a class="navbar-brand" href="{{ route('homepage') }}" style="margin-right: 25px; font-family: 'Fredoka One', cursive;"><img src="{{ asset('img/logo.svg') }}" style="height: 40px; padding: 2px 3px;"> MeetUp2TeamUp</a>
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
                  <a @if($suankisayfa == 1) href="#" class="nav-link active" aria-current="page" @else href="{{ route('paneladmin') }}"  class="nav-link"  @endif  style="margin-right: 15px;">Admin Paneli</a>
                </li>
                <li class="nav-item">
                  <a @if($suankisayfa == 2) href="#"  class="nav-link active" aria-current="page"  @else href="{{ route('proje_paneli') }}"  class="nav-link" @endif  style="margin-right: 15px;">İlanları Yönet</a>
                </li>
                <li class="nav-item">
                  <a @if($suankisayfa == 3) href="#"  class="nav-link active" aria-current="page"  @else href="{{ route('üye_paneli') }}" class="nav-link" @endif  style="margin-right: 15px;">Üyeleri Yönet</a>
                </li>
              </ul>


              <div class="dropdown">
                <button
                  class="btn btn-primary dropdown-toggle"
                  type="button"
                  id="dropdownMenuButton"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false"
                >
                Admin ({{ Auth::user()->name}})

                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="{{ route('dashboard') }}">Normal Üye Paneli</a></li>
                  <li><form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Çıkış Yap') }}
                </a>
                </form></li>

                </ul>
              </div>





            </div>
          </div>
        </nav>



        <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
