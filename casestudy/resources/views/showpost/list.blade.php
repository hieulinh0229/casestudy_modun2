@extends('layout.index')

@section('content')
    <div class="container">
        <h5 style="font-size: 25px;">News</h5>
        <div class="">
            <form method="post" class="navbar-form navbar-left" style="width: 300px;" action="{{route('Post.search')}}" >
                @csrf
                <div class="row">
                    <div class="col-10">
                        <div class="form-group">
                            </br>
                            <input type="text" class="form-control" id="keyword" name="keyword"  placeholder="Search">
                            <input class="btn btn-outline-primary" type="submit" value="Tìm kiếm">
                        </div>
                    </div>
                    <div class="col-4">
                        <a class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#tagsModal">
                            Lọc  </a>

                    </div>
                </div>
            </form>
        <div>
            @foreach($posts as $post)
            <div class="row border">
                <div class="col-sm-5 border">
                    @if($post->image)
                        <img src="{{asset('storage/'.$post->image )}}" alt="" style="width: 250px; height: auto;">
                    @else
                        {{'Chưa có ảnh'}}
                    @endif
                </div>
                <div class="col-sm-7 border">
                    <h5><a href="{{ route('guest.showpost', $post) }}">{{ $post->title }}</a><span class=" fa fa-thumbs-up"> {{{ count($post->likes)}}}</span></h5>
                    <h5> {{str_limit($post->content,120)}}</h5>
                    <label for="">
                        @foreach($post->tags as $tag)
                            #{{$tag->kind}}
                        @endforeach
                    </label>
                    <label for="">{{ $post->created_at }}</label>
                </div>
            </div>
            @endforeach
                {{ $posts->links() }}
        </div>
            <div class="modal fade" id="tagsModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <form  method="get" action="{{route('Post.filterByTags')}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                                <div class="select-by-program">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label border-right">Lọc theo thể loại</label>
                                        <div class="col-sm-7">
                                            <select class="custom-select w-100" name="tags" multiple>
                                                @foreach($tags as $tag)
                                                    <option
                                                            value="{{$tag->id}}">{{$tag->kind}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="submitAjax" class="btn btn-primary" >Chọn</button>
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection
