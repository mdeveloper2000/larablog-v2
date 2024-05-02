@extends('layouts.base')

@section('content')
    @include('partials._buttons')
    <x-flash-message />
    @include('partials._hero')
    <x-search />
    <div class="container">
        <div class="row">
            @foreach ($searchs as $search)
                <x-search-card :search="$search" />
            @endforeach            
        </div>
    </div>
@endsection