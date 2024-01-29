<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
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
    <!-- در فایل edit.blade.php -->
    <form action="{{ route('books.update', ['id' => $book->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h2>ویرایش کتاب: {{ $book->title }}</h2>

        <select name="category_id">
            <option value="">انتخاب دسته بندی</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <input type="text" name="title" placeholder="عنوان کتاب" value="{{ $book->title }}">
        <input type="text" name="author" placeholder="نویسنده" value="{{ $book->author }}">
        <input type="text" name="description" placeholder="توضیحات" value="{{ $book->description }}">
        <input type="file" name="image" placeholder="آدرس تصویر">
        <label for="pdf_file">فایل PDF</label>
        <input type="file" name="pdf_file" accept=".pdf">
        <button type="submit">اعمال تغییرات</button>
    </form>
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
