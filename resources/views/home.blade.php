@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <h1>Welcome to the Home Page</h1>
    <p>This is the content of the home page</p>
    @include('partials.welcome')
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
