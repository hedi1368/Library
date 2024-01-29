<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Books;

class CategoriesController extends Controller
{

    public function create()
    {
        // اطمینان از لاگین بودن کاربر
        if (Auth::check()) {
            // دریافت دسته بندی‌های اضافه شده توسط کاربر لاگین شده
            $user = Auth::user();
            $categories = Categories::where('user_id', $user->id)->get();

            return view('Library.categories.create', ['categories' => $categories]);
        } else {
            return redirect()->route('login')->with('error', 'برای مشاهده دسته بندی‌ها، لطفا وارد حساب کاربری خود شوید.');
        }
    }

    public function store(Request $request)
    {
        // اطمینان از لاگین بودن کاربر
        if (Auth::check()) {
            $user = Auth::user();

            // قواعد اعتبارسنجی
            $rules = [
                'name' => 'required|unique:categories,name,NULL,id,user_id,' . $user->id,
            ];

            $messages = [
                'name.required' => 'وارد کردن نام دسته بندی الزامی است.',
                'name.unique' => 'این نام دسته بندی قبلاً استفاده شده است.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            // اگر اعتبارسنجی ناموفق بود
            if ($validator->fails()) {
                return redirect()->route('categories.create')->withErrors($validator)->withInput();
            }

            // انجام عملیات اضافه کردن دسته بندی
            Categories::create([
                'name' => $request->input('name'),
                'user_id' => $user->id,
            ]);

            return redirect()->route('categories.create')->with('success', 'دسته بندی با موفقیت اضافه شد.');
        } else {
            return redirect()->route('login')->with('error', 'برای اضافه کردن دسته بندی، لطفا وارد حساب کاربری خود شوید.');
        }
    }


    // در app/Http/Controllers/CategoriesController.php

    public function edit($id)
    {
        // اطمینان از لاگین بودن کاربر
        if (Auth::check()) {
            $category = Categories::findOrFail($id);

            // اطمینان از اینکه دسته بندی متعلق به کاربر لاگین شده است
            if ($category->user_id == Auth::id()) {
                return view('Library.categories.edit', ['category' => $category]);
            } else {
                return redirect()->route('categories.create')->with('error', 'شما اجازه ویرایش این دسته بندی را ندارید.');
            }
        } else {
            return redirect()->route('login')->with('error', 'برای ویرایش دسته بندی، لطفاً وارد حساب کاربری خود شوید.');
        }
    }


    public function update(Request $request, $id)
    {
        // اطمینان از لاگین بودن کاربر
        if (Auth::check()) {
            $category = Categories::findOrFail($id);

            // اطمینان از اینکه دسته بندی متعلق به کاربر لاگین شده است
            if ($category->user_id == Auth::id()) {
                // قواعد اعتبارسنجی
                $rules = [
                    'name' => 'required|unique:categories,name,' . $id . ',id,user_id,' . Auth::id(),
                ];

                $messages = [
                    'name.required' => 'وارد کردن نام دسته بندی الزامی است.',
                    'name.unique' => 'این نام دسته بندی قبلاً استفاده شده است.',
                ];

                $validator = Validator::make($request->all(), $rules, $messages);

                // اگر اعتبارسنجی ناموفق بود
                if ($validator->fails()) {
                    return redirect()->route('categories.edit', $id)->withErrors($validator)->withInput();
                }

                // انجام عملیات ویرایش دسته بندی
                $category->update([
                    'name' => $request->input('name'),
                ]);

                return redirect()->route('categories.create')->with('success', 'دسته بندی با موفقیت ویرایش شد.');
            } else {
                return redirect()->route('categories.create')->with('error', 'شما اجازه ویرایش این دسته بندی را ندارید.');
            }
        } else {
            return redirect()->route('login')->with('error', 'برای ویرایش دسته بندی، لطفاً وارد حساب کاربری خود شوید.');
        }
    }




public function destroy($id)
{
    // اطمینان از لاگین بودن کاربر
    if (Auth::check()) {
        $category = Categories::findOrFail($id);

        // اطمینان از اینکه دسته بندی متعلق به کاربر لاگین شده است
        if ($category->user_id == Auth::id()) {
            // بررسی اینکه آیا به دسته بندی کتاب متصل است یا خیر
            if (Books::where('category_id', $category->id)->count() > 0) {
                return redirect()->route('categories.create')->with('error', 'این دسته بندی دارای کتاب متصل است و نمی‌توانید آن را حذف کنید.');
            }

            // حذف دسته بندی
            $category->delete();

            return redirect()->route('categories.create')->with('success', 'دسته بندی با موفقیت حذف شد.');
        } else {
            return redirect()->route('categories.create')->with('error', 'شما اجازه حذف این دسته بندی را ندارید.');
        }
    } else {
        return redirect()->route('login')->with('error', 'برای حذف دسته بندی، لطفاً وارد حساب کاربری خود شوید.');
    }
}

    

}