<div class="row mt-5 mb-5">
    <h4 class="text-center p-2 border bg-light rounded"><i class="bi bi-chat-square-dots-fill"></i> Comments</h4>
    <table class="table table-primary table-striped table-hover">
        @foreach($comments as $comment)
        <tr>
            <td style="width: 80%;" class="p-3">{{$comment->comment}}</td>
            <td class="text-end fst-italic p-3">{{date('d/m/Y H:i:s', strtotime($comment->created_at))}}</td>
        </tr>
        @endforeach
    </table>
</div>