@extends('layout')
@section('tieudetrang')
    <h1>Tin trong loại: {{ $idLT}} </h1>
@endsection

@section('noidung')
    <h1>Thông tin chi tiết các loại tin {{ $idLT}}</h1>
    @foreach ($listTin as $t)
        <div class="row">
            <a href="{{ url('/tin', [$t->id])}}">
                <h3> {{$t->tieuDe}}</h3>
            </a>
            <p> {{$t->tomTat}}</p>
        </div>
    @endforeach
@endsection
