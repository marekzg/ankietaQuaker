@extends('stat');

@section('content2')

    <blockquote class="blockquote text-success">
        <p>Opinie o nas</p>
    </blockquote>

    {{-- <div class="d-flex flex-row bd-highlight mb-12">
        <div class="p-2 bd-highlight">Tokeny wykorzystane: {{ $tokenUsed }} / 51</div>
        <div class="p-2 bd-highlight">Tokeny wole: {{ $tokenFree }} / 51</div>
    </div> --}}

    <div class="card mt-12">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Opinie</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>lp.</th>
                                <th>Imie Nazwisko</th>
                                <th>opinie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Users ?? [] as $user)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->imie }}</td>
                                    <td><a class="nav-link" href="{{ route('showOpinion',$user->id) }}">Sprawdz opinie</a></td>
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
