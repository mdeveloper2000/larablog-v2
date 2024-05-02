@extends('layouts.base')

@section('content')
    @include('partials._buttons')
    @include('partials._hero')
    <div class="container w-50 mt-3 border p-3">
        <form method="post" action="/users/update">
            @csrf
            @method('PUT')
            <h5 class="text-center mb-3 p-2 rounded text-bg-light border">Edit User</h5>
            <div class="mb-3">
                <input type="hidden" name="id" value="{{ $user->id }}" />
                <input type="text" class="form-control" name="name" placeholder="Name" 
                    aria-describedby="name" value="{{ $user->name }}">
                @error('name')
                    <div class="text-danger ms-3">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="E-mail" 
                    aria-describedby="email" value="{{ $user->email }}">
                @error('email')
                    <div class="text-danger ms-3">{{$message}}</div>              
                @enderror
            </div>            
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-person-plus-fill"></i> Update
                </button>
            </div>
        </form>        
    </div>    
@endsection