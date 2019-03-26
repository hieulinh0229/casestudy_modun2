<div id="sidebar">
    <div class="inner">
        <nav id="menu">
            <header class="major">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href="{{route('Post.list')}}">Bài Viết</a></li>
                <li><a href="{{route('Tag.list')}}">Thể loại</a></li>
                <li><a ></a></li>
            </ul>
            <ul></ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            User: {{ Auth::user()->name }}
                        </a>
                        <div >
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ ('Logout')}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        @auth
        @if(auth()->user()->role == 1)
        <li><a href="{{route('admin.quanly')}}">Quản lý user</a></li>
        @endif
        @endauth
        <header class="major">
            <h4>CONTACT</h4>
        </header>
        <ul class="contact">
            <li class="fa-envelope-o"> Email:mchinhly@gmail.com</li>
            <li class="fa-phone">Phone:0352670035</li>
            <li class="fa-home">29-Nguyên Tri Phương -TP Huế<br/></li>
        </ul>
        <hr>
        <footer>
            <div class="row">
                <div class="col-md-12">
                    <p align="center">Copyright &copy; Hoàng Minh Chính 2019</p>
                </div>
            </div>
        </footer>
    </div>
</div>
