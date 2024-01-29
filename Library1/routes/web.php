<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RegisterController;
use App\Models\Categories;
use App\Models\Books;
use Illuminate\Pagination\Paginator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// BooksController
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [BooksController::class, 'userindex'])->name('dashboard');
});
Route::get('/', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
Route::post('/books', [BooksController::class, 'store'])->name('books.store');
Route::post('/books/borrow/{id}', 'App\Http\Controllers\BooksController@borrowBook')->name('books.borrow');
Route::put('/books/return/{id}', [BooksController::class, 'returnBook'])->name('books.return');
Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('books.destroy');
Route::get('/books/edit/{id}', [BooksController::class, 'edit'])->name('books.edit');
Route::put('/books/update/{id}', [BooksController::class, 'update'])->name('books.update');

// CategoriesController
Route::delete('/categories/create/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::get('/categories/edit/{id}', 'App\Http\Controllers\CategoriesController@edit')->name('categories.edit');
Route::put('/categories/update/{id}', 'App\Http\Controllers\CategoriesController@update')->name('categories.update');

// RegisterController
Route::post('/activate-account', [RegisterController::class, 'activateAccount'])->name('activate-account');












// Route::prefix('books')->group(function (){
//     Route::controller('BooksController')->group(function() {

//         Route::get('/', 'index')->name('books.index');
//         Route::get('/create', 'create')->name('books.create');
//         Route::post("/books", "store")->name('books.store');
//         Route::post("/borrow/{id}", "borrowBook")->name('books.borrow');
//         Route::put("/return/{id}", "returnBook")->name('books.return');
//         Route::delete('/{id}', 'destroy')->name('books.destroy');
//         Route::get('/edit/{id}', 'edit')->name('books.edit');
//         Route::put('/update/{id}', 'update')->name('books.update');

//     });
// });

// Route::prefix('categories')->group(function (){
//     Route::controller('CategoriesController')->group(function() {

//         Route::get('/create', 'create')->name('categories.create');
//         Route::post('/categories', 'store')->name('categories.store');
//         Route::delete('/create/{id}', 'destroy')->name('categories.destroy');
//         Route::get('/edit/{id}', 'edit')->name('categories.edit');
//         Route::put('/update/{id}', 'update')->name('categories.update');

//     });
// });














// Route::get('/', function () {
//     return view('welcome');
// })->name('books.index');

// Route::get('/', function () {
//     return view('welcome', [
//         'categories' => Categories::all(),
//     ])->name('books.index');
// });

// Route::get('/ajax', [BooksController::class, 'index_ajax'])->name('library.index');



// Route::get('/', function () {
//     Paginator::useBootstrap();

//     $booksQuery = Books::query();

//     // اگر دسته‌بندی مشخص شده است، فیلتر کتاب‌ها بر اساس دسته‌بندی
//     if (request()->has('category_id')) {
//         $booksQuery->where('category_id', request()->input('category_id'));
//     }

//     $books = $booksQuery->paginate(5);

//     return view('welcome', [
//         'categories' => Categories::all(),
//         'books' => $books
//     ]);
// })->name('books.index');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

