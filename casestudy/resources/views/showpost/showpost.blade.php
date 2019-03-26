@extends('layout.index')

@section('content')
    <div class="container">

        <h5>{{ $post->title }}</h5>
        <div><img src="{{asset('storage/'.$post->image )}}" alt="" style="width: 300px; height: auto"></div>
        <div>
            <label for="">
                @foreach($post->tags as $tag)
                    #{{$tag->kind}}
                @endforeach
            </label>
        </div>
        <div>{{ $post->content }}</div>
        <div></a> <span class=" fa fa-thumbs-up"> {{{ count($post->likes)}}}</span></div>
        @can('update',$post)
            <a href="{{ route('Post.editShow',[$post])}}"><input  class="btn btn-secondary" type="submit" value="Edit"></a>
            <form action="{{route('Post.destroy',[$post])}}" method="post">
                @csrf
                <input type="text" name="_method" value="delete"  hidden>
                <a>  <input  class="btn btn-secondary" type="submit" value="Delete"></a>

            </form>
        @endcan
        <form action="{{route('Post.like',[$post])}}" method="post">
            @csrf
            <input  class="btn btn-secondary" type="submit" value=" Like">
        </form>

        </tbody>
        </table>
        <div>
            @foreach($post->comments as $comment)
                <div>
                    <h5> {{$comment->user->name}}</h5></br>
                    <p>{{$comment->content}}</p>
                </div>
            @endforeach
        </div>
        @include('comments.comment')

        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Quay lại</button>
    </div>
@endsection
