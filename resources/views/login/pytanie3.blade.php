@extends('stat');

@section('content2')

    <blockquote class="blockquote text-success">
        <p>Pytanie3 - Przekażemy wsparcie w kwocie 1000 zł trzem wybranym organizacjom lub klubom sportowym. Napisz swoją
            propozycję. Warunek: Uczestnictwo Twoje lub członka Twojej rodziny w tej organizacji.</p>
    </blockquote>

    {{-- <div class="d-flex flex-row bd-highlight mb-12">
        <div class="p-2 bd-highlight">Tokeny wykorzystane: {{ $tokenUsed }} / 51</div>
        <div class="p-2 bd-highlight">Tokeny wole: {{ $tokenFree }} / 51</div>
    </div> --}}

    <div class="card mt-12">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista odpowiedzi na pytanie 3</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>lp.</th>
                                <th>Odpowiedzi na pytanie 3</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pytanie3 ?? [] as $pytanie)
                                @if ($pytanie->question3)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pytanie->question3 }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $games->links() }} --}}
                </div>
            </div>
        </div>
    </div>


@endsection
