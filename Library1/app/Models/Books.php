<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Books extends Model
{
    use HasFactory;

    const BORROW_TIME_LIMIT = 2; // مهلت امانت‌گیری به روز

    protected $fillable = ['title', 'author', 'description', 'category_id', 'image', 'is_borrowed', 'user_id', 'user_id_create', 'borrowed_at', 'pdf_file', 'return_at'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function userBooks()
    {
        return $this->hasMany(Books::class, 'user_id');
    }

    // اضافه کردن رویداد برای ذخیره user_id_create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($book) {
            // اگر user_id_create تنظیم نشده باشد، آن را به شناسه کاربر لاگین شده تنظیم کنید
            $book->user_id_create = $book->user_id_create ?: auth()->id();
        });
    }

    // متد برای بازگرداندن کتاب به کتابخانه
    public function returnToLibrary()
    {
        $this->update([
            'is_borrowed' => false,
            'user_id' => null,
            'borrowed_at' => null,
            'return_at' => null,
        ]);
    }

    // متد برای بازگرداندن کتاب به کتابخانه
    public function returnBook()
    {
        $this->update(['is_borrowed' => false, 'user_id' => null, 'return_at' => null, 'borrowed_at' => null]);
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
