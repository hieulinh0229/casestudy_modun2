@extends('layout.index')
@section('title', 'Them bai viet')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Sửa Bài Viết</h1>
            </div>
            <div class="col-12">
                <form method= "post" action="{{route('Post.edit',$post)}}"  enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <input type="text" class="form-control" name="content" value="{{$post->content}}">
                    </div>
                    <div class="form-group">
                        <label>Tác giả</label>
                        <input type="text" class="form-control" name="auth" value="{{$post->auth}}">
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" class="form-control" name="image"  value="{{$post->image}}" >
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        </div>
                     <div>
                        <label>
                            <select class="form-control" name="tags" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->kind}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection





{{--@foreach($tags as $tag)--}}
{{--<div class="checkbox">--}}
{{--<label>--}}
{{--<input type="checkbox" name="tags[]" value="{{ $tag->id }}">--}}
{{--{{ $tag->kind }}--}}
{{--</label>--}}
{{--</div>--}}
{{--@endforeach--}}


