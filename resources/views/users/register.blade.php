@extends('layouts.base')

@section('content')
    @include('partials._buttons')
    @include('partials._hero')
    <div class="container w-50 mt-3 border p-3">
        <form method="post" action="/register">
            @csrf
            @method('PUT')
            <h5 class="text-center mb-3 p-2 rounded text-bg-light border">New User</h5>
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Name" 
                    aria-describedby="name" value="{{old('name')}}">
                @error('name')
                    <div class="text-danger ms-3">{{$message}}</div>              
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="E-mail" 
                    aria-describedby="email" value="{{old('email')}}">
                @error('email')
                    <div class="text-danger ms-3">{{$message}}</div>              
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" 
                    aria-describedby="password" value="{{old('password')}}" />
                @error('password')
                    <div class="text-danger ms-3">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" 
                    aria-describedby="Confirm password" value="{{old('password_confirmation')}}" />
                @error('confirm_password')
                    <div class="text-danger ms-3">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-person-plus-fill"></i> Register
                </button>
            </div>
        </form>        
    </div>    
@endsection