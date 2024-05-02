<div class="card mb-3 mt-3 p-3" style="width: 100%;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{$post->url_img == 'no-image.png' ? asset('images/no-image.png') : asset('storage/'.$post->url_img)}}" class="img-fluid rounded-start" alt="Card image from game review">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <h4 class="mt-3">
                    <a href="/posts/like/{{$post->id}}" class="text-dark" style="text-decoration: none;">
                        <span>
                            <i class="{{$me != null && $me->user_id == auth()->id() ? 'bi bi-heart-fill text-danger' : 'bi bi-heart text-dark'}} "></i>
                        </span> {{$likes}}
                    </a>&nbsp;
                    <a href="#" class="text-dark" style="text-decoration: none;">
                        <span>
                            <i class="bi bi-chat-right"></i>
                        </span> {{$comment}}
                    </a>
                </h4>
                <p class="card-text mt-3">{{$post->description}}</p>
                <p class="card-text mt-3">
                    <small class="text-muted">
                        Created {{$post->created_at->diff(now())->format("%d") > 0 ? 
                        ' at ' . $post->created_at->diff(now())->format("%d"). ' days' : 
                        ' at ' . $post->created_at->diff(now())->format("%h"). ' hours'}}
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>

@if(auth()->id() === 1)
    <div class="row mt-3 mb-3">
        <div class="col-12 text-end">
            <a href="/posts/edit/{{$post->id}}" type="button" class="btn btn-primary">
                <i class="bi bi-pencil-fill"></i> Edit Post
            </a>&nbsp;            
            <form method="post" action="/posts/delete/{{$post->id}}" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash-fill"></i> Delete Post
                </button>
            </form>
        </div>
    </div>
@endif

<x-comment-card :post="$post" />

<x-comments :comments="$comments" />

</div>