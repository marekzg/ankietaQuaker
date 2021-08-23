@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <!-- Brand/logo -->
                    {{-- <a class="navbar-brand" href="#">Logo</a> --}}

                    <!-- Links -->
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Tokeny</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('ranking') }}">Ranking</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pytanie2') }}">Pytanie 2</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pytanie3') }}">Pytanie 3</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pytanie4') }}">Pytanie 4</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pytanie5') }}">Pytanie 5</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pytanie6') }}">Pytanie 6</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('opinions') }}">Opinie</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('randomUserWin') }}">Losowanie tokenu</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('randomOrganization') }}">Losowanie organizacji</a>
                      </li>
                    </ul>
                  </nav>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    {{-- {{ __('You are logged in!') }} --}}

                    {{-- {{ __('To zacztnamy kodowanie d')}} --}}

                    @yield('content2')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection