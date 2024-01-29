<header class="navbar" style="background-color: #263238; border: none;">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        {{-- <a class="navbar-brand" href="#"></a> --}}
        <img class="navbar-brand" src="{{ asset('img/navbar-logo.png') }}" alt="..."
            style="width: 160px; margin: 0 15px">
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#"
                    style="color: aliceblue;">&#9776;</a>
            </li>


        </ul>
        <ul class="nav navbar-nav pull-left hidden-md-down " style="margin-left: 50px;">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">

                    <span class="hidden-md-down h4" style="color: white;">{{ auth()->user()->name }}</span>

                </a>

                <div>


                </div>

                <div class="dropdown-menu dropdown-menu-right" style="background-color: #263238">
                    <div class="dropdown-header text-xs-center" style="background-color: #263238">
                        <strong class="h5">تنظیمات</strong>
                    </div>

                    <a href="{{ route('profile.show') }}" class="dropdown-item h5">پروفایل</a>
                    <div class="divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="dropdown-item h5">خروج از حساب کاربری</button>
                    </form>


                </div>
            </li>


        </ul>
    </div>
</header>

<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item" style="height: 53px; background-color: #172024;">
            </li>

            <li class="nav-title" style="margin-top: 20px;">
                پنل کاربری
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/dashboard') }}"><i class="icon-user-follow"></i> کتابهای شما </a>
            </li>


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#" dir="rtl"
                    style="background-color: #172024"><i class="icon-puzzle"></i> کتابخانه شما</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.create') }}"><i class="icon-puzzle"></i> دسته
                            بندی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.create') }}"><i class="icon-puzzle"></i>
                            کتابها</a>
                    </li>

                </ul>
            </li>




        </ul>
    </nav>
</div>