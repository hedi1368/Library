<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Librarycontroller extends Controller
{

    public function store(Request $request)
    {

        // اطمینان از لاگین بودن کاربر
        if (Auth::check()) {
            $user = Auth::user();

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

  

}



