<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class CheckAccountStatus
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         return $next($request);
//     }
// }




// namespace App\Http\Middleware;

// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Closure;
// use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Auth;

// // class CheckAccountStatus
// // {
// //     public function handle($request, Closure $next)
// //     {
// //         // اگر کاربر وارد شده است
// //         if (Auth::check()) {
// //             $user = Auth::user();

// //             // اگر زمان ثبت‌نام انقضا گذشته باشد، اکانت را غیرفعال کنید
// //             if (now() > $user->registration_expiration) {
// //                 $user->update(['is_active' => false]);
// //                 Auth::guard('web')->logout(); // خروج از حساب کاربری
// //                 return redirect()->route('login')->with('error', 'اکانت شما غیرفعال شده است.')->send();
// //             }
// //         }

// //         return $next($request);
// //     }


// // }

// class CheckAccountStatus
// {
//     public function handle($request, Closure $next)
//     {
//         // اگر کاربر وارد شده است
//         if (Auth::check()) {
//             $user = Auth::user();

//             // اگر زمان ثبت‌نام انقضا گذشته باشد، اکانت را غیرفعال کنید
//             if (now() > $user->registration_expiration) {
//                 $user->update(['is_active' => false]);
//                 Auth::guard('web')->logout(); // خروج از حساب کاربری
//                 return redirect()->route('login')->with('error', 'اکانت شما غیرفعال شده است.')->send();
//             }

//             // اگر اکانت غیرفعال است و زمان ثبت‌نام انقضا نگذشته باشد
//             if (!$user->is_active && now() <= $user->registration_expiration) {
//                 // فعال کردن اکانت
//                 $user->update(['is_active' => true]);

//                 // تمدید زمان انقضاء
//                 $user->update(['registration_expiration' => now()->addDays(5)]);

//                 // لاگین کاربر
//                 Auth::login($user);
//                 return redirect('/'); // یا هر مسیر دلخواهی برای لاگین شده کاربر
//             } else {
//                 return redirect()->route('login')->with('error', 'اکانت شما فعال نیست.')->send();
//             }

//         }

//         return $next($request);
//     }
// }


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Books; // لازم است مدل مربوط به کتب به امانت‌برده شده را وارد کنید


class CheckAccountStatus
{



public function handle($request, Closure $next): Response
{
    // اگر کاربر وارد شده است
    if (Auth::check()) {
        $user = Auth::user();

        // بررسی اگر زمان ثبت‌نام انقضا گذشته باشد، اکانت را غیرفعال کنید
        if (now() > $user->registration_expiration) {
            $user->update(['is_active' => false]);

            // اجرای کد بازگرداندن کتابها به کتابخانه
            $borrowedBooks = Books::where('user_id', $user->id)->get();
            
            foreach ($borrowedBooks as $borrowedBook) {
                // انجام عملیات مربوط به بازگرداندن هر کتاب به کتابخانه
                $borrowedBook->returnToLibrary();
            }
            

            Auth::guard('web')->logout(); // خروج از حساب کاربری
            return redirect()->route('login')->with('error', 'اکانت شما غیرفعال شده است.');
        }
    }

    return $next($request);
}


}



