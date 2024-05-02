@extends('layouts.base')

@section('content')
    @include('partials._buttons')
    @include('partials._hero')
    <div class="container w-50 mt-3 mb-3 border p-3">
        <form method="post" action="/advertisements/store" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h5 class="text-center mb-3 p-2 rounded text-bg-light border">Create Advertisement</h5>
            <div class="mb-3">
                <input class="form-control" type="file" name="url_img" />
                @error('url_img')
                    <div class="text-danger ms-3">{{$message}}</div>              
                @enderror
            </div>
            <div class="mb-3 text-end">                
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-sd-card-fill"></i> Save
                </button>
            </div>
        </form>
    </div>
@endsection