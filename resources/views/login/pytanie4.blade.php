@extends('stat');

@section('content2')

    <blockquote class="blockquote text-success">
        <p>Pytanie 2 - Czy poleciłbyś/abyś pracę w ISG przyjacielowi bądź komuś z rodziny?</p>
    </blockquote>

    <div class="d-flex flex-row bd-highlight mb-12 d-flex justify-content-around">
        <div class="p-3 mb-3 bd-highlight ">TAK: {{ $tak }} </div>
        <div class="p-3 mb-3 bd-highlight ">NIE WIEM: {{ $niewiem }} </div>
        <div class="p-3 mb-3 bd-highlight ">NIE: {{ $nie }} </div>
    </div>

@endsection
