<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MeetUp2TeamUp</title>
        <!-- MDB icon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
        <!-- MDB -->
        <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/iletisim.css') }}">
</head>

<body>




    @include('parts.navbar', ['suankisayfa' => 4, 'bodymargin' => 60])




    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form method="post" action="{{ route('contact.store') }}" style="max-width: 800px; margin: auto;">

            {{ csrf_field() }}

            <div class="form-group">
                <label>İsim</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name" required>

                <!-- Error -->
                @if ($errors->has('name'))
                <div class="error">
                    {{ $errors->first('name') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email" required>

                @if ($errors->has('email'))
                <div class="error">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Telefon</label>
                <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" required>

                @if ($errors->has('phone'))
                <div class="error">
                    {{ $errors->first('phone') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Konu</label>
                <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject" id="subject" required>

                @if ($errors->has('subject'))
                <div class="error">
                    {{ $errors->first('subject') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Mesaj</label>
                <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                    rows="4" required></textarea>

                @if ($errors->has('message'))
                <div class="error">
                    {{ $errors->first('message') }}
                </div>
                @endif
            </div>

            <input type="submit" name="send" value="Gönder" class="btn btn-dark btn-block">
        </form>
    </div>





    @include('parts.footer')

    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
</body>

</html>
