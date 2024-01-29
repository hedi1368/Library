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
    <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
        @csrf
        @method('PUT')

        <h2>ویرایش دسته بندی: {{ $category->name }}</h2>

        <input type="text" name="name" placeholder="نام دسته بندی" value="{{ $category->name }}">
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
