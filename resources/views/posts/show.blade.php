@extends('layouts.base')

@section('content')
    @include('partials._buttons')
    <x-flash-message />
    @include('partials._hero')
    <x-search />
    <x-show-card :post="$post" :likes="$likes" :comment="$comment" :comments="$comments" :me="$me" />
@endsection