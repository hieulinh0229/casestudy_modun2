@extends('layout.index')
@section('title', 'Them bai viet')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm thể loại </h1>
            </div>
            <div class="col-12">
                <form method= "post" action="{{route('Tag.update')}}"  enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label>Thể loại </label>
                        <input type="text" class="form-control" name="kind" >
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="tex" class="form-control" name="descryption" >
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
