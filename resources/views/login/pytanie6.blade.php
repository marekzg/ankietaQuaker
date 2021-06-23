@extends('stat');

@section('content2')

    <blockquote class="blockquote text-success">
        <p>Pytanie6 - Jaki masz pomysł na ciekawe gadżety firmowe. </p>
    </blockquote>

    {{-- <div class="d-flex flex-row bd-highlight mb-12">
        <div class="p-2 bd-highlight">Tokeny wykorzystane: {{ $tokenUsed }} / 51</div>
        <div class="p-2 bd-highlight">Tokeny wole: {{ $tokenFree }} / 51</div>
    </div> --}}

    <div class="card mt-12">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista odpowiedzi na pytanie 6</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>lp.</th>
                                <th>Pomysł na ciekawe gadżety firmowe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pytanie6 ?? [] as $pytanie)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pytanie->question6 }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $games->links() }} --}}
                </div>
            </div>
        </div>
    </div>


@endsection
