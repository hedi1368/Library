<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

// var_dump($userBooks);
// die();

class BooksController extends Controller
{

public function create(Request $request)
{
    if (Auth::check()) {

        Paginator::useBootstrap();
        // دریافت همه‌ی دسته‌بندی‌ها
        $categories = Categories::all();

        // دریافت کتاب‌های کاربر
        $userBooksQuery = Books::where('user_id_create', Auth::id());

        // اگر دسته‌بندی انتخاب شده باشد
        if ($request->has('category_id') && $request->input('category_id') != 'all') {
            $selectedCategory = $request->input('category_id');
            $userBooksQuery->where('category_id', $selectedCategory);
        }

        // دریافت نتیجه نهایی
        // $userBooks = $userBooksQuery->get();
        $userBooks = $userBooksQuery->paginate(5); // تعداد مورد نمایش در هر صفحه

        // ارسال اطلاعات به صفحه‌ی ویو
        return view('Library.books.create', [
            'categories' => $categories,
            'userBooks' => $userBooks,
            'selectedCategory' => $selectedCategory ?? 'all',
        ]);

    } else {
        // اگر کاربر وارد نشده باشد، به صفحه‌ی ورود هدایت شود
        return redirect()->route('login')->with('error', 'برای اضافه کردن کتاب، لطفاً وارد حساب کاربری خود شوید.');
    }
}






    public function store(Request $request)
    {
        // ...
        if (Auth::check()) {
            $user = Auth::user();
            $request->validate([
                'title' => 'required|unique:books',
                'author' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1000000',
                'pdf_file' => 'required|mimes:pdf|max:2000000',
            ]);


         

            // آپلود تصویر
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $imagePath = str_replace('public/', '', $imagePath);
            }

            // آپلود فایل PDF
            if ($request->hasFile('pdf_file')) {
                $pdfPath = $request->file('pdf_file')->store('public/pdfs');
                $pdfPath = str_replace('public/', '', $pdfPath);
            }

            $book = Books::create([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'description' => $request->input('description'),
                'image' => $imagePath,
                'pdf_file' => $pdfPath, // افزودن این خط برای ذخیره مسیر فایل PDF
                'category_id' => $request->input('category_id'),
                'user_id_create' => $user->id,
            ]);

            return redirect()->route('books.create', ['id' => $request->input('category_id')])->with('success', 'کتاب با موفقیت به دسته بندی اضافه شد.');
        } else {
            return redirect()->route('login')->with('error', 'برای اضافه کردن کتاب به دسته بندی، لطفا وارد حساب کاربری خود شوید.');
        }
    }


    //...

    public function edit($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $book = Books::where('user_id_create', $user->id)->find($id);

            if ($book && !$book->is_borrowed) {
                $categories = Categories::all();

                return view('Library.books.edit', compact('book', 'categories'));
            } else {
                return redirect()->route('books.create')->with('error', 'شما اجازه ویرایش این کتاب را ندارید یا کتاب به امانت گرفته شده است.');
            }
        } else {
            return redirect()->route('login')->with('error', 'برای ویرایش کتاب، لطفاً وارد حساب کاربری خود شوید.');
        }
    }


    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $book = Books::where('user_id_create', $user->id)->find($id);

            if (!$book) {
                return redirect()->route('books.create')->with('error', 'شما اجازه ویرایش این کتاب را ندارید.');
            }

            $request->validate([
                'title' => 'required|unique:books,title,' . $book->id,
                'author' => 'required',
                'description' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:1000000',
                'pdf_file' => 'mimes:pdf|max:2000000',
            ]);

            $imagePath = $book->image;
            $pdfPath = $book->pdf_file;

            // آپلود تصویر
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $imagePath = str_replace('public/', '', $imagePath);
            }

            // آپلود فایل PDF
            if ($request->hasFile('pdf_file')) {
                $pdfPath = $request->file('pdf_file')->store('public/pdfs');
                $pdfPath = str_replace('public/', '', $pdfPath);
            }

            $book->update([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'description' => $request->input('description'),
                'image' => $imagePath,
                'pdf_file' => $pdfPath, // افزودن این خط برای ذخیره مسیر فایل PDF
                'category_id' => $request->input('category_id'),
            ]);

            return redirect()->route('books.create')->with('success', 'تغییرات با موفقیت ذخیره شدند.');
        } else {
            return redirect()->route('login')->with('error', 'برای ویرایش کتاب، لطفاً وارد حساب کاربری خود شوید.');
        }
    }



    public function destroy($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $book = Books::findOrFail($id);
    
            // اطمینان حاصل شود که کتاب متعلق به کاربر لاگین شده است
            if ($book->user_id_create == $user->id && !$book->is_borrowed) {
                $book->delete();
                return redirect()->route('books.create')->with('success', 'کتاب با موفقیت حذف شد.');
            } else {
                return redirect()->route('books.create')->with('error', 'شما اجازه حذف این کتاب را ندارید یا کتاب به امانت گرفته شده است.');
            }
        } else {
            return redirect()->route('login')->with('error', 'برای حذف کتاب، لطفاً وارد حساب کاربری خود شوید.');
        }
    }
    


    const BORROW_TIME_LIMIT = 2; // مهلت امانت‌گیری به روز

    public function borrowBook(Request $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $maxBorrowLimit = 3; // حداکثر تعداد کتب قابل امانت‌گیری

            // تعداد کتب به امانت گرفته شده توسط کاربر
            $borrowedBooksCount = Books::where('user_id', $user->id)->where('is_borrowed', true)->count();

            // اگر تعداد به امانت گرفته شده هنوز حداکثر مجاز نباشد
            if ($borrowedBooksCount < $maxBorrowLimit) {
                $book = Books::findOrFail($id);

                // اگر کتاب به امانت گرفته نشده باشد
                if (!$book->is_borrowed && !$book->borrowed_at) {
                    // چک کنید که زمان انقضاء کتاب قبلی گذشته باشد یا خیر
                    if ($user->hasOverdueBook()) {
                        return redirect()->route('books.index')->with('error', 'قبل از امانت گیری کتاب جدید، ابتدا کتاب قبلی را پس بدهید.');
                    }

                    // کتاب به امانت گرفته نشده و زمان پس دادن هم نشده باشد
                    $book->update([
                        'is_borrowed' => true,
                        'user_id' => $user->id,
                        'borrowed_at' => now(),
                        'return_at' => now()->addDays(self::BORROW_TIME_LIMIT),
                    ]);

                    // محاسبه باقی‌مانده زمان
                    $remainingTime = now()->addDays(self::BORROW_TIME_LIMIT)->diffForHumans();

                    return redirect()->route('books.index')->with('success', 'کتاب با موفقیت به امانت گرفته شد. باقی‌مانده زمان: ' . $remainingTime);
                } else {
                    return redirect()->route('books.index')->with('error', 'این کتاب قبلا به امانت گرفته شده است.');
                }
            } else {
                return redirect()->route('books.index')->with('error', 'شما به تعداد حداکثر مجاز کتب را به امانت گرفته‌اید.');
            }
        } else {
            return redirect()->route('login')->with('error', 'برای امانت گیری، لطفا وارد حساب کاربری خود شوید.');
        }
    }


  

    public function returnBook(Request $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $book = Books::where('id', $id)
                ->where('user_id', $user->id)
                ->where('is_borrowed', true)
                ->first();

            if ($book) {
                $book->update([
                    'is_borrowed' => false,
                    'user_id' => null,
                    'borrowed_at' => null,
                    'return_at' => null,
                ]);

                return redirect()->route('dashboard')->with('success', 'کتاب با موفقیت پس داده شد.');
            } else {
                return redirect()->route('dashboard')->with('error', 'کتاب مورد نظر یافت نشد یا به امانت گرفته نشده است.');
            }
        } else {
            return redirect()->route('login')->with('error', 'برای پس دادن کتاب، لطفاً وارد حساب کاربری خود شوید.');
        }
    }



    public function index(Request $request)
    {
        // افزودن این خط جهت استفاده از Paginator
        Paginator::useBootstrap();

        $booksQuery = Books::query();

        if ($request->has('category_id')) {
            $booksQuery->where('category_id', $request->input('category_id'));
        }

        $books = $booksQuery->paginate(8); // تعداد مورد نمایش در هر صفحه

        $selectedCategory = $request->input('category_id');
        $categories = Categories::all();

        return view('welcome', compact('categories', 'books', 'selectedCategory'));
    }



    public function userindex()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $borrowedBooks = Books::where('user_id', $user->id)->where('is_borrowed', true)->get();

            return view('dashboard', ['borrowedBooks' => $borrowedBooks]);
        } else {
            return redirect()->route('login')->with('error', 'برای مشاهده کتاب‌های به امانت گرفته شده، لطفا وارد حساب کاربری خود شوید.');
        }
    }

}


