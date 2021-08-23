@extends('stat');

@section('content2')

    <blockquote class="blockquote text-success">
        <p>Losowanie tokenu</p>
    </blockquote>



    <div class="card border border-success shadow-0 mb-12" style="width: 100%;">
        <div class="card-header">Losowanie zwycięzcy :)</div>
        <div class="card-body text-success">
            <h5 class="card-title text-center h2">
                @if ($start == 1)
                    {{ $tokenWin->token }}
                @endif
            </h5>
            {{-- <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
          </p> --}}
        </div>
    </div>
    <a class="nav-link" href="{{ route('randomUserWin', 1) }}">
        <button type="button" class="btn btn-outline-success randomButon" data-mdb-ripple-color="dark">
            Losowanie
        </button>
    </a>



    <div class="d-flex flex-row bd-highlight mb-12">
        <div class="p-2 bd-highlight">Tokeny wykorzystane: {{ $tokenUsed }} / 51</div>
    </div>

    <div class="card mt-12">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Tokeny użyta</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Lp</th>
                                <th>Token</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($listTokensFree ?? [] as $token)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $token->token }}</td>
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
