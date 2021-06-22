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

                <div class="card mt-12">
                    <div class="card">
                        <div class="card-header h2">Ankieta - strona 4 / 4 </div>
                        <div class="card-body">
                            <form action="{{ route('queryForm') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- X-XSRF-TOKEN -->


                                <div class="alert alert-primary h6">
                                    <strong> Pytanie 2.<br>
                                        Jaki napój najchętniej wybierasz w pracy: </strong>
                                    <div class="form-group">
                                        <select class="form-control" id="napuj" name="napoj">
                                            <option value="Herbata">Herbata</option>
                                            <option value="Woda">Woda</option>
                                            <option value="Kawa">Kawa</option>
                                            <option value="Małpka">Małpka </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="alert alert-primary h6">
                                    <strong> Pytanie 3.<br>
                                        Przekażemy wsparcie w kwocie 1000 zł trzem wybranym organizacjom lub klubom
                                        sportowym. Napisz swoją propozycję.
                                        Warunek: Uczestnictwo Twoje lub członka Twojej rodziny w tej organizacji.
                                    </strong>
                                    <div class="form-group h5">
                                        <label for="comment"><strong>Pytanie otwartej odpowiedzi:</strong></label>
                                        <textarea class="form-control" rows="3" id="comment"
                                            name="organizacja"></textarea>
                                    </div>
                                </div>

                                <div class="alert alert-primary h6">
                                    <strong> Pytanie 4.<br>
                                        Czy poleciłbyś/abyś pracę w ISG przyjacielowi bądź komuś z rodziny?
                                    </strong>
                                    <div class="form-group">
                                        <select class="form-control" id="napuj" name="workIsgroup">
                                            <option value="tak">tak</option>
                                            <option value="nie">nie</option>
                                            <option value="nie wiem">nie wiem</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="alert alert-primary h6">
                                    <strong> Pytanie 5.<br>
                                        Pomóż nam w wyborze miejsca i atrakcji na kolejne spotkanie integracyjne                                         2022.<br>
                                    </strong>
                                    <div class="form-group h5">
                                        <label for="comment"><strong>Miejsce:</strong></label>
                                        <textarea class="form-control" rows="1" id="comment"
                                            name="imprezaMiejsce"></textarea>
                                    </div>
                                    <div class="form-group h5">
                                        <label for="comment"><strong> Twoją propozycję na atrakcję:</strong></label>
                                        <textarea class="form-control" rows="2" id="comment"
                                            name="imprezaAtrakcje"></textarea>
                                    </div>
                                </div>

                                <div class="alert alert-primary h6">
                                    <strong> Pytanie 6.<br>
                                        6. Jaki masz pomysł na ciekawe gadżety firmowe. <br>
                                    </strong>
                                    <div class="form-group h5">
                                        <label for="comment"><strong>Napisz swoje pomysły:</strong></label>
                                        <textarea class="form-control" rows="2" id="comment" name="gadzety"></textarea>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Wyślij</button>
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
