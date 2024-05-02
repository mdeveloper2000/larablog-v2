<div class="card border-light bg-light shadow-lg p-2 mb-3">
    <img class="card-img-top p-2" style="height: 250px;" 
        src="{{$advertisement->url_img == 'no-image.png' ? asset('images/no-image.png') : asset('storage/'.$advertisement->url_img)}}" alt="Card for advertisement">
</div>