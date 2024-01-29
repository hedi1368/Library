<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\ActivateAccount;


class RegisterController extends Controller
{





public function activateAccount(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if (!$user->is_active && $user->registration_expiration < now()) {
            // اکانت غیرفعال و زمان انقضاء منقضی شده است
            $user->update(['registration_expiration' => now()->addDays(5)]);
            $user->update(['is_active' => true]);
            session()->flash('success', 'اکانت شما با موفقیت فعال شد و زمان انقضاء تمدید شد.');
        } else {
            // اکانت قبلاً فعال شده است یا زمان انقضاء هنوز به پایان نرسیده است
            session()->flash('error', 'اکانت شما هم‌اکنون فعال است یا زمان انقضاء هنوز به پایان نرسیده است.');
        }

        Auth::logout(); // خروج کاربر پس از اجرای فعال‌سازی
    } else {
        session()->flash('error', 'اطلاعات وارد شده معتبر نیستند.');
    }

    return redirect()->route('login');
}



}


  



