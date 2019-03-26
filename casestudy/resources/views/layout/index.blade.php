<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
    .font {
        font-size: 20px;
    }
</style>
<body>
    <div class="container-fluid" style="background:#b3d7ff;">
        <div>
            <div class="container-fluid">
                <img src="{{asset('storage/image/banner001.jpg')}}" style="width: 100%" alt="">
            </div>
        </div>
        <div class="row">
            <!-- Left Menu-->
            <div class="col-sm-3 " id="font">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active font" href="{{route('guest.index')}}" ><span class="fa fa-home"></span> Trang chủ</a>
                        <hr style="color: red">
                    </li>

                    @auth
                        @if(auth()->user())
                    <li class="nav-item">
                        <a class="nav-link font" href="{{route('Post.list')}}">Bài viết</a>
                        <hr style="color: red">
                    </li>
                        @endif
                    @endauth
                    @auth
                        @if(auth()->user()->role == 1)
                    <li class="nav-item font">
                        <a class="nav-link font" href="{{route('Tag.list')}}">Thể loại</a>
                        <hr style="color: red">
                    </li>
                    <li class="nav-item font">

                        <a class="nav-link font" href="{{route('admin.quanly')}}">Quản lý user</a>
                        <hr style="color: red">
                         @endif
                     @endauth
                    </li>
                    <li class="nav-item font">
                            @guest
                                <li class="nav-item font">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item font">
                                        <a class="nav-link font" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown font">
                                    <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="fa fa-user "></span> User: {{ Auth::user()->name }}
                                        <hr style="color: red">
                                    </a>

                                        <a class="dropdown-item font" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="font" style="color: #0c5460;">{{ ('Logout')}}</span>
                                            <hr style="color: red">
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </li>
                             @endguest
                    </li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-sm-9 ">
                @yield('content')
            </div>
        </div>
        </br>
        <div class="container-fluid">
            <div class="footer">
                <div class="row">
                    <div class="col-md-12">
                        <p align="center"> Copyright &copy; Hoàng Minh Chính 2019 </p>
                         <p align="center"> <span class="fa fa-phone" > 0352670035</span> <span class="fa fa-envelope-o">:mchinhly@gmail.com</span> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
