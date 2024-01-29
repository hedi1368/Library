<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use Laravel\Fortify\Rules\Password;
use Carbon\Carbon;

// class CreateNewUser implements CreatesNewUsers
// {
//     use PasswordValidationRules;

//     /**
//      * Validate and create a newly registered user.
//      *
//      * @param  array<string, string>  $input
//      * 
//      * @return mixed
//      */
//     public function create(array $input): User
//     {
//         Validator::make($input, [
//             'name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//             'password' => $this->passwordRules(),
//             'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
//         ])->validate();

//         return User::create([
//             'name' => $input['name'],
//             'email' => $input['email'],
//             'password' => Hash::make($input['password']),
//             'registration_expiration' => Carbon::now()->addDays(5), // تعیین مدت زمان انقضاء به 5 روز

//         ]);

//         return $user;

//     }
// }



// app/Actions/Fortify/CreateNewUser.php



class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return mixed
     */
    public function create(array $input)
    {
        // اعتبارسنجی اطلاعات
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // ایجاد کاربر
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'registration_expiration' => Carbon::now()->addDays(2), // تعیین مدت زمان انقضاء به 2 روز
        ]);

        // اگر زمان ثبت‌نام انقضا گذشته باشد، اکانت را غیرفعال کنید
        if (now() > $user->registration_expiration) {
            $user->update(['is_active' => false]);
        }

        // ارسال ایمیل تأیید به کاربر
        // ...

        return $user;
    }
}

