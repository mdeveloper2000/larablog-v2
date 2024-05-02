<div class="col-3 mt-2">
    <div class="card border-light bg-light shadow-lg" style="width: 100%;">
        <img class="card-img-top p-2" style="height: 250px;" src="{{$post->url_img == 'no-image.png' ? asset('images/no-image.png') : asset('storage/'.$post->url_img)}}" alt="Card image from game review">
        <div class="card-body" style="height: 100px;">
            <p class="card-text">{{$post->title}}</p>
        </div>
        <a href="/posts/{{$post->id}}" class="btn btn-dark rounded-top-0">
            <i class="bi bi-book-fill"></i> Keep reading...
        </a>
    </div>
</div>