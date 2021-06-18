<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>Laravel@@1</title>

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

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="fs-3">


                <blockquote class="title blockquote text-primary">
                    <p>Industrial Solutions Group Sp. z o.o.</p>
                </blockquote>

                <div class="card mt-3">
                    <div class="card">
                        <div class="card-header h2">Ankieta</div>
                        <div class="card-body">
                            <form action="{{ route('checkToken') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- X-XSRF-TOKEN -->

                                <input type="text" name="token" class="form-control" value=""
                                    placeholder="wprowadz token">
                                <br>
                                <button type="submit" class="btn btn-success">Sprawdz</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>