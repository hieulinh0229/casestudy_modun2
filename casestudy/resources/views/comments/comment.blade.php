<div class="well">
    <h5>Viết bình luận ... <span class="glyphicon glyphicon-pencil"></span></h5>
    <form  method="post"action="{{route('post.comment', ['postid' => $post->id])}}" accept-charset="utf-8">
        @csrf
        <div class="form-group">
            <textarea name="content" rows="3" class="form-control"></textarea>
        </div>
        {{--The input co name='_method' value-'put' de route hieu la mot request put--}}

        <button type="submit" class="btn btn-primary">Bình Luận</button>
    </form>
</div>
