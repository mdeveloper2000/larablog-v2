@extends('layouts.base')

@section('content')
    @include('partials._buttons')
    <x-flash-message />
    @include('partials._hero')
    <x-search />
    <div class="container-fluid">
        <div class="row">            
            @foreach ($posts as $post)
                <x-hcard :post="$post" />
            @endforeach
            <div class="col-3">
                <h4 class="text-center border p-3 shadow">Latest releases</h4>
                @foreach ($advertisements as $advertisement)
                    <x-vcard :advertisement="$advertisement" />
                @endforeach
            </div>
        </div>
    </div>    
    <div class="container w-50 mt-5">
        @if(auth()->id() === 1)
            <div class="row mt-5">
                <hr class="mt-5" />
                <div class="col-6">
                    <a type="button" class="btn btn-success mt-5 mb-5 w-100" href="/posts/create">
                        <i class="bi bi-file-post-fill"></i> Create a post
                    </a>
                </div>
                <div class="col-6">
                    <a type="button" class="btn btn-primary mt-5 mb-5 w-100" href="/advertisements/create">
                        <i class="bi bi-file-post-fill"></i> Create an advertisement
                    </a>
                </div>                
            </div>
        @endif
    </div>
@endsection