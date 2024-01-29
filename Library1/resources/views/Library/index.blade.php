<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>

<body>
    {{-- <h2>لیست دسته‌بندی‌ها:</h2>
    <ul>
        <li><a href="{{ route('books.index') }}">نمایش همه</a></li>
        @foreach ($categories as $category)
            <li><a href="{{ route('books.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>

    <hr>


    <h2>لیست کتاب‌ها:</h2>
    <ul>
        @foreach ($books as $book)
            <li>
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                    style="width: 100px; height: 100px;">
                <div>نام کتاب : {{ $book->title }}</div>
                <div>نویسنده : {{ $book->author }}</div>
                <div>توضیحات : {{ $book->description }}</div>



                @if (!$book->is_borrowed)
                    <form action="{{ route('books.borrow', ['id' => $book->id]) }}" method="post">
                        @csrf
                        <button type="submit">امانت گیری</button>
                    </form>
                @else
                    <p style="color: grey;">به امانت گرفته</p>
                @endif
            </li>
        @endforeach
    </ul>

    {{ $books->links() }} --}}



    {{-- @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p style="color: rgb(22, 84, 22);">{{ session('success') }}</p>
    @endif --}}


    {{-- <div id="alertContainer" class="alert-container">
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
    @endif --}}


    {{-- <h2>لیست دسته‌بندی‌ها:</h2>
    <ul>
        <li><a href="{{ route('books.index') }}">نمایش همه</a></li>
        @foreach ($categories as $category)
            <li><a href="{{ route('books.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
    <h2>لیست کتاب‌ها:</h2>
    <ul>
        @foreach ($books as $book)
            <li>
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" style="width: 100px; height: 100px;">
                <div>نام کتاب : {{ $book->title }}</div>
                <div>نویسنده : {{ $book->author }}</div>
                <div>توضیحات : {{ $book->description }}</div>
    
                @if (!$book->is_borrowed)
                    <form action="{{ route('books.borrow', ['id' => $book->id]) }}" method="post">
                        @csrf
                        <button type="submit">امانت گیری</button>
                    </form>
                @else
                    <p style="color: grey;">به امانت گرفته</p>
                @endif
            </li>
        @endforeach
    </ul>
    {{ $books->links() }} --}}


    <!-- Library.index.blade.php -->

    <h2>لیست کتاب‌ها:</h2>
  

    {{-- @foreach ($books as $book)
    <div class="item">
        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" style="width: 100px; height: 100px;">
        <div>نام کتاب : {{ $book->title }}</div>
        <div>نویسنده : {{ $book->author }}</div>
        <div>توضیحات : {{ $book->description }}</div>

        @if (!$book->is_borrowed)
            <form action="{{ route('books.borrow', ['id' => $book->id]) }}" method="post">
                @csrf
                <button type="submit">امانت گیری</button>
            </form>
        @else
            <p style="color: grey;">به امانت گرفته</p>
        @endif
    </div>
    @endforeach --}}

    @foreach ($books as $book)
    <div class="portfolio-item">
        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">

            {{-- <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." /> --}}
            <img class="img-fluid" src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">

        </a>
        <div class="portfolio-caption">
            {{-- <div class="portfolio-caption-heading">Threads</div>
            <div class="portfolio-caption-subheading text-muted">Illustration</div> --}}

            <div>نام کتاب : {{ $book->title }}</div>
            <div>نویسنده : {{ $book->author }}</div>
            <div>توضیحات : {{ $book->description }}</div>
            @if (!$book->is_borrowed)
            <form action="{{ route('books.borrow', ['id' => $book->id]) }}" method="post">
                @csrf
                <button type="submit">امانت گیری</button>
            </form>
        @else
            <p style="color: grey;">به امانت گرفته</p>
        @endif
        </div>
    </div>
    @endforeach

    {{ $books->links() }}




</body>

</html>
