@extends('layout.index')
@section('title','Danh sách bài viết')
@section('content')
        <div class="col-md-12">
        </div>
        <div class="col-12">
            <form method="get" class="navbar-form navbar-left" style="width: 300px;" action="{{route('Post.search')}}" >
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
        </div>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success" style="font-size: 40px;">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success')}}
                </p>
            @endif
                @if(count($errors) > 0)
                    <div>
                        <ul class="alert-dark">
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

        </div>
        <div class="col-md-12">
            <table class="table table-striped">

                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Số Like</th>
                    <th>Thể Loại</th>
                    <th></th>
                </thead>
                <tbody>
                @if(count($posts) ==0)
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr>
                @else
                @foreach($posts as $key => $post)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if($post->image)
                                <img src="{{asset('storage/'.$post->image )}}" alt="" style="width: 300px; height: auto">
                            @else
                                {{'Chưa có ảnh'}}
                            @endif
                        </td>
                        <td>{{ count($post->likes) }}</td>
                        <td>
                                @foreach( $post->tags as $tag )
                                   {{ $tag->kind }}<br>
                                @endforeach
                        </td>
                        <td>
                        <a href="{{ route('Post.show',[$post])}}"><input  class="btn btn-secondary" type="submit" value="Show"></a><br>
                        @can('update',$post)
                        <a href="{{ route('Post.editShow',[$post])}}"><input  class="btn btn-secondary" type="submit" value="Edit"></a><br>
                            <form action="{{route('Post.destroy',[$post])}}" method="post">
                            @csrf
                                <input type="text" name="_method" value="delete"  hidden>
                               <a>  <input   class="btn btn-secondary" type="submit" value="Xoa"></a>

                            </form>
                            {{--<td><a href="{{route('Post.destroy',[$post])}}">xoa</a><br>--}}

                        @endcan
                            <form action="{{route('Post.like',[$post])}}" method="post">
                            @csrf
                            <input  class="btn btn-secondary" type="submit" value="Like">
                            </form>

                    </tr>
                @endforeach
              @endif
                </tbody>
            </table>
            {{ $posts->links() }}
            @auth
            <a href="{{route('Post.showAdd')}}" class="btn btn-primary">Thêm mới</a><br><br>
            @endauth
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
                                        <select class="custom-select w-100" name="tags" multiple="multiple">
                                            @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->kind}}</option>
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
    <div class="pagination float-md-right">
    </div>
@endsection
