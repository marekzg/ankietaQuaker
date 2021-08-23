<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <div class="card-header h2">
                        <h2>Ankieta</h2>
                        {{-- <div class="text-primary h5">Ankieta jest w pełni anonimowa. Jej celem jest poznanie Wasze
                            opinii</div> --}}
                        <div class="text-danger h5">Niestety spóźniłeś się - ankieta jest już nie dostępna :(</div>
                    </div>
                    {{-- <div class="card-body">
                        <form action="{{ route('checkToken') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- X-XSRF-TOKEN -->

                            <input type="text" name="token" class="form-control" value=""
                                placeholder="wprowadz token">
                            <br>
                            <button type="submit" class="btn btn-success">Sprawdź</button>
                        </form>
                    </div> --}}
                </div>
            </div>

        </div>

    </div>
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
