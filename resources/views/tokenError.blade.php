<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Refresh" content="10; url={{ route('index') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <title>Ankieta-is-group.pl</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif --}}
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="fs-3">


                <blockquote class="title blockquote text-primary">
                    <img src="./img/logo_isg.png">
                    <p>Industrial Solutions Group Sp. z o.o.</p>
                </blockquote>

                <div class="card mt-3">
                    <div class="card">
                        <div class="card-header h2">{{ $title }}</div>
                        <div class="card-body text-error worning">
                            {{ $worning }}<br>
                            {{ $text ?? '' }}<br>
                            <p class="text-secondary">
                                Za chwilę zostaniesz przekierowany na stronę główną.
                            </p>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</body>

</html>
