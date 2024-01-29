<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title>dashboard</title>
    <!-- Icons -->
    <link href="{{ asset('font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('simple-line-icons.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('dest/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet" /> --}}

    <style>
        body:not(.top-nav) .sidebar ul.nav li.nav-item a.nav-link:hover {
            background-color: #11242d !important;
        }

        body:not(.top-nav) .sidebar ul.nav li.nav-item a.nav-link {
            font-size: 18px !important;
        }

        body:not(.top-nav) .sidebar ul.nav li.nav-title {
            font-size: 20px !important;
            font-weight: normal;
            background-color: #161f23 !important;
        }

        .dropdown-menu {
            border: none !important;
            margin: 0 !important;
            background-color: #263238 !important;
        }

        .dropdown-item {
            color: white !important;
        }

        .dropdown-item:focus,
        .dropdown-item:hover {
            background-color: #11242d !important;
            color: white !important;

        }

        .hover:hover {
            opacity: .7;
        }

        .alert-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            display: none;

        }

        .breadcrumb{
            position: fixed !important;
            width: 100%;
            z-index: 1;
        }

        /* card */

        .portfolio-item {
            max-width: 20rem;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
            transition: 500ms;
        }

        .portfolio-item:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            translate: 0 -10px;
        }

        .portfolio-item .portfolio-link {
            position: relative;
            display: block;
            margin: 0 auto;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        .portfolio-item .portfolio-caption {
            padding: 1.5rem;
            text-align: center;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
        }

        .btn-dark {
            background-color: #172024;
            color: #fff;
            border-radius: 6px;
            font-size: 20px;
            /* font -weight: 5px; */
            /* padding: 10 1000px; */
            width: 100%;
        }

        .btn-dark:hover {
            opacity: .8;
        }

        .pdf {
            color: #770404;
            font-size: 19px;
        }

        .pdf:hover {
            color: #dd0000;
        }

        .pdf::before {
            content: "×-×-»»  ";
        }

        .pdf::after {
            content: "  ««-×-×";
        }

        /* footer */

        .bg_footer {
            background-image: url(../img/bg_footer.jpg) !important;
            height: 100px !important;
            background-repeat: repeat-x !important;
            background-size: 10% 100% !important;
        }
    </style>
</head>




<body class="navbar-fixed sidebar-nav fixed-nav">

    @include('Library.menu')
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb" style="background-color: #172024;">
            <li class="breadcrumb-item h5 hover"><a class="nav-link" href="{{ route('books.index') }}"
                    style="color: rgb(251, 205, 0);">خانه</a></li>
            <li class="breadcrumb-item" style="color: aliceblue;">مدیریت
            </li>
            <li class="breadcrumb-item active">داشبرد</li>

        </ol>

        <div class="container-fluid">
            <h2 style="margin: 50px 0">کتابتان را بر اساس دسته بندی اضافه کنید :</h2>

            <div class="animated fadeIn">

                <div class="row">
                    <!-- Portfolio item 1-->

                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <select name="category_id">
                            <option value="">انتخاب دسته بندی</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="title" placeholder="عنوان کتاب">
                        <input type="text" name="author" placeholder="نویسنده">
                        <input type="text" name="description" placeholder="توضیحات">
                        <input type="file" name="image" placeholder="آدرس تصویر">
                        <label for="pdf_file">فایل PDF</label>
                        <input type="file" name="pdf_file" accept=".pdf">
                        <button type="submit">اضافه کردن کتاب</button>

                    </form>

                    <h2>لیست کتاب‌های شما:</h2>


                    <!-- ایجاد فرم برای انتخاب دسته‌بندی -->
                    <form method="GET" action="{{ route('books.create') }}" >
                        @csrf
                        <label for="category">انتخاب دسته‌بندی:</label>
                        <select name="category_id" id="category">
                            <option value="all" @if ($selectedCategory == 'all') selected @endif>همه دسته‌بندی‌ها
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($selectedCategory == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">اعمال فیلتر</button>
                    </form>




                    @if ($userBooks)
                        @foreach ($userBooks as $book)
                            <div class="col-lg-2 col-sm-6 mb-4" style="margin: 50px 20px; ">
                                <div class="portfolio-item">

                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                        <img class="img-fluid" src="{{ asset('storage/' . $book->image) }}"
                                            alt="{{ $book->title }}" style="width: 100%; height: 200px;">
                                    </a>

                                    <div class="portfolio-caption" dir="rtl" style="height: 250px;overflow: auto;">
                                        <div style="float: right"><b>نام کتاب :</b> {{ $book->title }}</div><br>
                                        <div style="float: right"><b>ژانر کتاب :</b> {{ $book->category->name }}</div>
                                        <br>
                                        <div style="float: right"><b>نویسنده کتاب :</b> {{ $book->author }}</div><br>
                                        <div style="float: right"><b>خلاصه کتاب :</b><br> {{ $book->description }}
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="portfolio-caption" dir="rtl">
                                        @if ($book->pdf_file)
                                            <a class="pdf" href="{{ asset('storage/' . $book->pdf_file) }}"
                                                target="_blank">مشاهده
                                                PDF</a><br>
                                        @else
                                            <span class="btn">فایل PDF موجود نیست</span><br>
                                        @endif
                                        <form action="{{ route('books.destroy', ['id' => $book->id]) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                                        </form>


                                        <a href="{{ route('books.edit', ['id' => $book->id]) }}">ویرایش</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
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
                    
                </div>
                {{ $userBooks->links() }}


            </div>

        </div>

        <!--/.container-fluid-->
    </main>



    <footer class="footer bg_footer">

    </footer>
    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/libs/pace.min.js') }}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('js/libs/Chart.min.js') }}"></script>

    <!-- CoreUI main scripts -->

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    <script src="{{ asset('js/views/main.js') }}"></script>

    <!-- Grunt watch plugin -->
    <script src="//localhost:35729/livereload.js"></script>
</body>

</html>
