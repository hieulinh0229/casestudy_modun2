@extends('layout.index')
@section('title', 'Them bai viet')
@section('content')
    <div class="col-12 col-md-12" >
        <div class="row">
            <div class="col-12">
                <h1>Thêm Bài Viết </h1>
            </div>
            <div>
                @if(count($errors) > 0)
                    <div>
                        <ul >
                            @foreach($errors->all() as $error)
                                <li >
                                    <div style="color: red">
                                        {{$error}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-12">
                <form method= "post" action="{{route('Post.update')}}"  enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label>Tiêu đề </label>
                        <input type="text" class="form-control" name="title" >
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <input type="text" class="form-control" name="content" >
                    </div>
                    <div class="form-group">
                        <label>Tác giả</label>
                        <input type="text" class="form-control" name="auth" >
                    </div>
                    <div class="form-group">
                        <label>PICTURE</label>
                        <input type="file" class="form-control" name="image" >
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->kind}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection

