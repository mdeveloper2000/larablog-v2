<form method="post" action="{{('/posts/search')}}">
    @csrf
    <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" name="query" 
            placeholder="Search for game reviews" aria-label="Search for game reviews" 
            aria-describedby="button-addon2">
        <button class="btn btn-primary" type="submit">
            <i class="bi bi-search"></i> Search
        </button>
    </div>
</form>