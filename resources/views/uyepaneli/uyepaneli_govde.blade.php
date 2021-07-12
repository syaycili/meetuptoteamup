<style>


.uyepaneli_anagovde{
    width: 100%;
    padding: 5%
}
.form_alani{

}


</style>




<div class="uyepaneli_anagovde">



    <a href="{{ route('profile.show') }}">
        {{ __('Profile') }}
    </a>





    <form method="POST" action="{{ route('logout') }}">
        @csrf
    <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
    </a>
    </form>






    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5" href="">İlanlarınızı Görüntüleyin</a>




    <h3 class="text-2xl mb-1">Merhaba <b>{{$user = auth()->user()->name}}</b></h3>
    <p class="text-lg mb-10">Yeni bir takım ilanı oluşturmak ister misin?</p>





    <form action="{{ url('proje/store') }}" method="POST" class="form_alani">
        {{ csrf_field() }}
        <div class="form-outline mb-4">

            <label class="form-label" for="baslik">Proje Başlık</label>
            <input type="text" id="baslik" class="form-control" name="baslik" required/>

        </div>

        <div class="form-outline mb-4">

            <label class="form-label" for="sahip">Proje Sahibi</label>
            <input type="text" id="sahip" class="form-control" name="sahip" required/>

        </div>

        <div class="form-outline mb-4">

            <label class="form-label" for="aciklama">Proje Açıklaması</label>
            <textarea id="aciklama" class="form-control" name="aciklama" required></textarea>

        </div>


        <input type="submit" class="btn btn-success" value="Gönder">

    </form>
</div>

<script type="text/javascript" src="{{ asset('public/js/mdb.min.js') }}"></script>


