<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{route('home')}}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{asset('frontEndAsset')}}/assets/img/logo.png" alt=""> -->
            <h1>ZenBlog</h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{route('home')}}">Blog</a></li>
{{--                <li><a href="{{route('blog.detail')}}">Single Post</a></li>--}}
                <li class="dropdown"><a href="#"><span>Categories</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{route('zen.category',['catId' => $category->id])}}">{{$category->category_name}}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->

        <div class="position-relative">
            @if(Session::get('userId'))
            <a href="#" class="btn btn-primary mx-2">{{Session::get('userName')}}</a>
            <a href="{{route('logout')}}" class="btn btn-primary mx-2">Logout</a>
            @else
                <a href="{{route('user.login')}}" class="btn btn-primary mx-2">Login</a>
                <a href="{{route('user.register')}}" class="btn btn-primary mx-2">Register</a>
            @endif

            <a href="#" class="mx-2 js-search-open">
{{--                <span class="bi-search"></span>--}}
            </a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="search-result.html" class="search-form">
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Search" class="form-control">
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header>
