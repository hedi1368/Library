{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            لیست کتاب‌های به امانت گرفته شده توسط شما

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
                <a href="{{ route('categories.create') }}" class="btn btn-success m-4">مدیریت دسته بندیها</a>
                <a href="{{ route('books.create') }}" class="btn btn-success m-4">مدیریت کتابها</a>
              
                <h2>لیست کتاب‌های به امانت گرفته شده توسط شما:</h2>
                <ul>
                    @foreach ($borrowedBooks as $book)
                        <li>
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                                style="width: 100px; height: 100px;">

                            <div>نام کتاب : {{ $book->title }}</div>
                            <div>نویسنده : {{ $book->author }}</div>
                            <div>دسته بندی : {{ $book->category->name }}</div>
                            <div>توضیحات : {{ $book->description }}</div>

                            @if ($book->pdf_file)
                                <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank">مشاهده PDF</a>
                            @else
                                <span>فایل PDF موجود نیست</span>
                            @endif
                            <form action="{{ route('books.return', ['id' => $book->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit">پس دادن کتاب</button>
                            </form>
                        </li>
                    @endforeach
                </ul>


                @if (session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif
                @if (session('success'))
                    <p style="color: rgb(22, 84, 22);">{{ session('success') }}</p>
                @endif

            </div>
        </div>
    </div>

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

</x-app-layout> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
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
    {{-- <div>
        <a href="{{ route('categories.create') }}" class="btn btn-success m-4">مدیریت دسته بندیها</a>
        <a href="{{ route('books.create') }}" class="btn btn-success m-4">مدیریت کتابها</a>
        <h2>لیست کتاب‌های به امانت گرفته شده توسط شما:</h2>
        <ul>
            @foreach ($borrowedBooks as $book)
                <li>
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                        style="width: 100px; height: 100px;">

                    <div>نام کتاب : {{ $book->title }}</div>
                    <div>نویسنده : {{ $book->author }}</div>
                    <div>دسته بندی : {{ $book->category->name }}</div>
                    <div>توضیحات : {{ $book->description }}</div>

                    لینک فایل PDF
                    @if ($book->pdf_file)
                        <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank">مشاهده PDF</a>
                    @else
                        <span>فایل PDF موجود نیست</span>
                    @endif

                    نمایش زمان باقی‌مانده
                    @php
                        $borrowedDate = \Carbon\Carbon::parse($book->borrowed_at);
                        $returnDate = $borrowedDate->copy()->addDays(\App\Models\Books::BORROW_TIME_LIMIT);
                        $remainingDays = now()->diffInDays($returnDate, false);
                    @endphp

                    @if ($remainingDays > 0)
                        <div>زمان باقی‌مانده: {{ $remainingDays }} روز</div>
                    @else
                        <div style="color: red;">زمان به اتمام رسیده است!</div>
                    @endif



                    می‌توانید دیگر اطلاعات مربوط به کتاب را نیز نمایش دهید
                    <form action="{{ route('books.return', ['id' => $book->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit">پس دادن کتاب</button>
                    </form>
                </li>
            @endforeach
        </ul>



    </div> --}}
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{-- {{ __('Dashboard') }} --}}
                لیست کتاب‌های به امانت گرفته شده توسط شما

            </h2>
        </x-slot>
    </x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{-- <x-welcome /> --}}
                    <a href="{{ route('categories.create') }}" class="btn btn-success m-4">مدیریت دسته بندیها</a>
                    <a href="{{ route('books.create') }}" class="btn btn-success m-4">مدیریت کتابها</a>

                    <h2>لیست کتاب‌های به امانت گرفته شده توسط شما:</h2>
                    <ul>
                        @foreach ($borrowedBooks as $book)
                            <li>
                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                                    style="width: 100px; height: 100px;">

                                <div>نام کتاب : {{ $book->title }}</div>
                                <div>نویسنده : {{ $book->author }}</div>
                                <div>دسته بندی : {{ $book->category->name }}</div>
                                <div>توضیحات : {{ $book->description }}</div>

                                @if ($book->pdf_file)
                                    <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank">مشاهده PDF</a>
                                @else
                                    <span>فایل PDF موجود نیست</span>
                                @endif
                                <form action="{{ route('books.return', ['id' => $book->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">پس دادن کتاب</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>

                    {{-- 
                @if (session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif
                @if (session('success'))
                    <p style="color: rgb(22, 84, 22);">{{ session('success') }}</p>
                @endif --}}

                </div>
            </div>
        </div>


    
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
