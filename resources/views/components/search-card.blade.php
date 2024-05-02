<div class="col-3 mt-3 mb-3">
    <div class="card border-light bg-light shadow-lg" style="width: 100%;">
        <img class="card-img-top p-2" style="height: 250px;" src="{{$search->url_img == 'no-image.png' ? asset('images/no-image.png') : url('storage/'.$search->url_img)}}" alt="Card image from game review">
        <div class="card-body" style="height: 100px;">
            <p class="card-text">{{$search->title}}</p>
        </div>
        <a href="/posts/{{$search->id}}" class="btn btn-dark rounded-top-0">
            <i class="bi bi-book-fill"></i> Keep reading...
        </a>
    </div>
</div>