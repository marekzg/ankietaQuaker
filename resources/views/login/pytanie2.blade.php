@extends('stat');

@section('content2')

    <blockquote class="blockquote text-success">
        <p>Pytanie 2 - Jaki napój najchętniej wybierasz w pracy</p>
    </blockquote>

    <div class="d-flex flex-row bd-highlight mb-12 d-flex justify-content-around ">
        <div class="p-3 mb-3 bd-highlight ">HERBATA: {{ $herbata }} </div>
        <div class="p-3 mb-3 bd-highlight ">WODA: {{ $woda }} </div>
        <div class="p-3 mb-3 bd-highlight ">KAWA: {{ $kawa }} </div>
        <div class="p-3 mb-3 bd-highlight ">MAŁPKA: {{ $malpka }} </div>
    </div>

@endsection
