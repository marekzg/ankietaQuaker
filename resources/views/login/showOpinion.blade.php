@extends('stat');

@section('content2')

    <blockquote class="blockquote text-success">
        {{-- <p>Pytanie6 - Jaki masz pomysł na ciekawe gadżety firmowe. </p> --}}
    </blockquote>

    {{-- <div class="d-flex flex-row bd-highlight mb-12">
        <div class="p-2 bd-highlight">Tokeny wykorzystane: {{ $tokenUsed }} / 51</div>
        <div class="p-2 bd-highlight">Tokeny wole: {{ $tokenFree }} / 51</div>
    </div> --}}

    <div class="card mt-12">
        <div class="card">
            <div class="card-header"><strong class="fas fa-table mr-1 h5">{{ $imieNazwisko->imie }} - lista opinii</strong></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table " id="dataTable" width="100%" cellspacing="0">
                            {{-- <tr>
                                <th>Opinie</th>
                            </tr> --}}
                        </thead>
                        <tbody>
                            @foreach ($opinionUser ?? [] as $opinion)
                                <tr>
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td>{{ $opinion->opinion }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                <a href="{{ url()->previous() }}" class="btn btn-primary btn-lg btn-block " >Powrót do listy opinii</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- {{ $games->links() }} --}}
            </div>
        </div>
    </div>
    </div>


@endsection
