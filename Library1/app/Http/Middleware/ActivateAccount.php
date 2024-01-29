<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class ActivateAccount
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


// app/Http/Middleware/ActivateAccount.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ActivateAccount
{


    public function handle($request, Closure $next)
    {



        $user = Auth::user();
        
        if ($user && property_exists($user, 'is_active') && property_exists($user, 'registration_expiration')) {
            if (!$user->is_active) {
                $user->update(['registration_expiration' => now()->addDays(5)]);
                $user->update(['is_active' => true]);
                Log::info('اکانت کاربر با موفقیت فعال شد و زمان انقضاء تمدید شد.');
                return redirect()->route('login')->with('success', 'اکانت شما با موفقیت فعال شد و زمان انقضاء تمدید شد.');
            } else {
                Log::info('اکانت کاربر هم‌اکنون فعال است یا زمان انقضاء به پایان رسیده است.');
                return redirect()->route('login')->with('success', 'اکانت شما با موفقیت فعال شد و زمان انقضاء تمدید شد. لطفاً وارد شوید.');
            }
        }
        
        return $next($request);
    }
}


