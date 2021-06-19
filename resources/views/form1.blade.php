<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>Ankieta Is-Group</title>

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

                <div class="card mt-12">
                    <div class="card">
                        <div class="card-header h2">Ankieta - strona 1 / 4  </div>
                        <div class="card-body">
                            <form action="{{ route('query1') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- X-XSRF-TOKEN -->

                                {{-- <input type="text" name="token" class="form-control" value=""
                                    placeholder="wprowadz token"> --}}

                                <div class="alert alert-primary h3">
                                    <strong> Pytanie 1.<br>
                                        Które osoby z firmy darzysz największą sympatią ?<br>
                                        - możesz wybrać tylko 1 osobę<br>
                                        - pod listą krótko napisz dlaczego wybrałeś tę osobę </strong>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>lp</th>
                                                <th>Imie Nazwisko</th>
                                                <th>zdięcie</th>
                                                <th>Ocena </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allUsers ?? [] as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->imie }}</td>
                                                    <td> <img src="./img/{{ $user->foto }}" alt="{{ $user->imie }}"
                                                            width="100px" height="auto">
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="checkUser" id="osoba{{ $user->id }}"
                                                                value="{{ $user->id }}">
                                                            <label class="form-check-label"
                                                                for="osoba{{ $user->id }}">
                                                                wybieram
                                                            </label>
                                                        </div>


                                                        {{-- <div class="form-check form-check-inline"> --}}
                                                        {{-- <input class="form-check-input" name="osoba{{ $user->id }}" type="checkbox" value="false"
                                                            id="inlineCheckbox"> --}}

                                                        {{-- </div> --}}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="form-group h3">
                                        <label for="comment">Krótko napisz dlaczego wybrało się te osoby:</label>
                                        <textarea class="form-control" rows="3" id="comment"
                                            name="opisUsers"></textarea>
                                    </div>

                                </div>


                                <br>
                                <button type="submit" class="btn btn-success">Dalej</button>
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
