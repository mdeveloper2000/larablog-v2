<form method="post" action="/posts/comment/{{$post->id}}">
    @csrf
    <div class="row">
        <div class="col-11">
            <textarea class="form-control" name="comment" rows="1" style="resize: none;" 
            placeholder="Make a comment"></textarea>
            @error('comment')
                <div class="text-danger ms-3">{{$message}}</div>              
            @enderror
        </div>
        <div class="col-1">
            <button type="submit" class="btn btn-primary btn-lg" title="Send comment">
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </div>
</form>