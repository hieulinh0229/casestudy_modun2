@extends('layout.index')
@section('title', 'Thể loại')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $key => $tag)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $tag->kind }}</td>
                        <td>{{ $tag->descryption }}</td>
                        <td><a href="{{ route('Tag.editShow',[$tag->id]) }}">sửa</a></td>
                        <td><a href="{{ route('Tag.destroy',[$tag->id]) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $tags->links() }}
            <a href="{{ route('Tag.show') }}" class="btn btn-primary">Thêm mới</a><br><br>
        </div>

    </div>
    {{--<div class="pagination float-md-right">--}}
        {{--{{ $posts->links() }}--}}
    {{--</div>--}}
@endsection
