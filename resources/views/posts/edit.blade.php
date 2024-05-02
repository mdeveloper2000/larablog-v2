@extends('layouts.base')

@section('content')
    @include('partials._buttons')
    @include('partials._hero')
    <div class="container w-50 mt-3 mb-3 border p-3">
        <form method="post" action="/posts/update" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h5 class="text-center mb-3 p-2 rounded text-bg-light border">Edit Post</h5>
            <input type="hidden" name="id" value="{{$post->id}}" />
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Title" 
                    aria-describedby="title" value="{{$post->title}}">
                @error('title')
                    <div class="text-danger ms-3">{{$message}}</div>              
                @enderror
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="description" placeholder="Description" 
                rows="3" style="resize: none;">{{$post->description}}</textarea>
                @error('description')
                    <div class="text-danger ms-3">{{$message}}</div>              
                @enderror
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="url_img" />
                @error('url_img')
                    <div class="text-danger ms-3">{{$message}}</div>              
                @enderror
            </div>
            <div class="mb-3">
                <div class="text-end">
                    <img src="{{$post->url_img == 'no-image.png' ? asset('images/no-image.png') : asset('storage/'.$post->url_img)}}" alt="Post image" width="55" height="55" />                           
                </div>                
            </div>
            <div class="mb-3 text-end">                               
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-fill"></i> Edit
                </button>                
            </div>
        </form>
    </div>
@endsection