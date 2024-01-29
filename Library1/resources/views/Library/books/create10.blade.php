<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <title>create</title>
    <link href="{{ asset('font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('simple-line-icons.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('dest/style.css') }}" rel="stylesheet">
    <style>
      

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
    </style>
</head>

<body>
    

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
    <ul>
        @if ($userBooks)
            @foreach ($userBooks as $book)
                <li>
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                        style="width: 100px; height: 100px;">

                    <div>نام کتاب : {{ $book->title }}</div>
                    <div>نویسنده : {{ $book->author }}</div>
                    <div>دسته بندی : {{ $book->category->name }}</div>
                    <div>توضیحات : {{ $book->description }}</div>


                    <!-- افزودن دکمه حذف به هر کتاب -->
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                    </form>

                    @if ($book->pdf_file)
                        <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank">مشاهده PDF</a>
                    @else
                        <span>فایل PDF موجود نیست</span>
                    @endif

                    <a href="{{ route('books.edit', ['id' => $book->id]) }}">ویرایش</a>
                </li>
            @endforeach
        @endif

    </ul>

    <div id="alertContainer" class="alert-container">
        <p id="alertMessage"></p>
    </div>

    <script>
        function showAlert(message, duration) {
            var alertContainer = document.getElementById('alertContainer');
            var alertMessage = document.getElementById('alertMessage');

            alertMessage.innerHTML = message;
            alertContainer.style.display = 'block';

            setTimeout(function() {
                alertContainer.style.display = 'none';
            }, duration);
        }
    </script>

    @if (session('error'))
        <script>
            showAlert("{{ session('error') }}", 10000); // 10000 میلی‌ثانیه (10 ثانیه)
        </script>
    @endif

    @if (session('success'))
        <script>
            showAlert("{{ session('success') }}", 10000); // 10000 میلی‌ثانیه (10 ثانیه)
        </script>
    @endif


 
</body>



</html>
