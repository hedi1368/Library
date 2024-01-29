<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        .login {
            text-decoration: none;
            margin-right: 30px;
            font-weight: 500;
        }

        .hov:hover {
            color: rgb(0, 0, 0);
            font-weight: bold;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('img/navbar-logo.png') }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                منو
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">دیالوگ</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#portfolio" data-bs-toggle="dropdown" dir="rtl">
                            دسته بندی
                        </a>
                        <ul class="dropdown-menu  
                            dropdown-menu-dark">
                            <li style="float: right !important;"><a class="dropdown-item"
                                    href="{{ route('books.index') }}">همه دسته بندی
                                    ها</a>
                            </li>
                            @foreach ($categories as $category)
                                <li style="float: right !important;"><a class="dropdown-item"
                                        href="{{ route('books.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                                </li><br><br>
                            @endforeach


                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#about">درباره ما</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#team">Team</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="#contact">ارتباط با ما</a></li>
                </ul>
            </div>
        </div>

        <nav class="main-nav nav">
            @if (Route::has('login'))
                <div class="m">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="login">پنل کاربری</a>
                    @else
                        <a href="{{ route('login') }}" class="login">ورود</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="login">ثبت نام</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>

    </nav>

    <!-- Masthead-->
    <div class="masthead">

    </div>

    <!-- Services-->
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if (session('error'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        title: "{{ session('error') }}"
                    });
                </script>
            @endif

            @if (session('success'))
                <script>
                   const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "{{ session('success') }}"
                    });
                </script>
            @endif

            <div class="text-center">

                <h2 class="section-heading text-uppercase">
                    @if (isset($selectedCategory) && $selectedCategory == 'all')
                        همه دسته بندی ها
                    @elseif(isset($selectedCategory))
                        {{ $categories->find($selectedCategory)->name }}
                    @else
                        همه دسته بندی ها
                    @endif
                </h2>
                <h3 class="section-subheading text-muted" dir="rtl">بر اساس دسته بندی انتخاب کنید...</h3>
            </div>
            <div class="row">
                <!-- Portfolio item 1-->

                @foreach ($books as $book)
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="portfolio-item">

                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <img class="img-fluid" src="{{ asset('storage/' . $book->image) }}"
                                    alt="{{ $book->title }}" style="width: 100%; height: 300px;">
                            </a>

                            <div class="portfolio-caption" dir="rtl" style="height: 250px;overflow: auto;">
                                <div style="float: right"><b>نام کتاب :</b> {{ $book->title }}</div><br>
                                <div style="float: right"><b>ژانر کتاب :</b> {{ $book->category->name }}</div><br>
                                <div style="float: right"><b>نویسنده کتاب :</b> {{ $book->author }}</div><br>
                                <div style="float: right"><b>خلاصه کتاب :</b><br> {{ $book->description }}</div><br>

                            </div>
                            <div class="portfolio-caption" dir="rtl">

                                @if (!$book->is_borrowed)
                                    <form action="{{ route('books.borrow', ['id' => $book->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-dark hov" type="submit">امانت گیری</button>
                                    </form>
                                @else
                                    <p style="color: grey;">به امانت گرفته</p>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
            <div style="width: auto; margin: auto;">
                <div style="margin: auto; width: 15%;">{{ $books->links() }}</div>
            </div>



        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">درباره ما</h2>
                <h3 class="section-subheading text-muted" dir="rtl">گذر زمان در آرزوهایی که خاطره میشوند...</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('img/1.jpg') }}"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2009-2011</h4>
                            <h4 class="subheading">Our Humble Beginnings</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('img/2.jpg') }}"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>March 2011</h4>
                            <h4 class="subheading">An Agency is Born</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('img/3.jpg') }}"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>December 2015</h4>
                            <h4 class="subheading">Transition to Full Service</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('img/4.jpg') }}"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>July 2020</h4>
                            <h4 class="subheading">Phase Two Expansion</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('img/5.jpg') }}"
                            alt="..." />

                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">دیالوگ های ماندگار</h2>
                <h3 class="section-subheading text-muted" dir="rtl">بخوانید و خاطره سازی کنید...</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="pic">
                        <img class="rounded-circle2 " src="{{ asset('img/6.png') }}" alt="..." />
                    </div>
                    <h4 class="my-3">E-Commerce</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                        architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <div class="pic">
                        <img class="rounded-circle2 " src="{{ asset('img/7.png') }}" alt="..." />
                    </div>
                    <h4 class="my-3">Responsive Design</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                        architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <div class="pic">
                        <img class="rounded-circle2 " src="{{ asset('img/8.png') }}" alt="..." />
                    </div>
                    <h4 class="my-3">Web Security</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                        architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="bg_footer"></div>
    <!-- Footer-->
    <footer class="footer py-4" id="contact">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start" style="color: #ffc800;">Copyright &copy; Your Website 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end" style="clear: #ffc800;">
                    <a class=" text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class=" text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function getBooks(url) {
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'html',
                success: function(data) {
                    // جایگزینی محتوای کتاب‌ها بدون ایجاد تکرار
                    var booksContainer = $('.books-container');
                    booksContainer.find('ul').html($(data).find('.books-container ul').html());
                    booksContainer.find('.pagination').html($(data).find('.books-container .pagination')
                        .html());
                }
            });
        }

        $('.category-link').on('click', function(e) {
            e.preventDefault(); // این خط جلوگیری از رفرش صفحه است
            var categoryId = $(this).data('category-id');
            var url = "{{ route('books.index') }}?category_id=" + categoryId;
            getBooks(url);
            window.history.pushState("", "", url);
        });

        $('.pagination').on('click', 'a', function(e) {
            e.preventDefault(); // این خط جلوگیری از رفرش صفحه است
            var url = $(this).attr('href');
            getBooks(url);
            window.history.pushState("", "", url);
        });
    </script> --}}

</body>

</html>
