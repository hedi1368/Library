{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        @unless (Auth::check() && Auth::user()->is_active)
            <form method="POST" action="{{ route('activate-account') }}">
                @csrf

                <label for="email">ایمیل:</label>
                <input type="email" name="email" required>

                <label for="password">رمز عبور:</label>
                <input type="password" name="password" required>

                <x-button type="submit">
                    {{ __('Activate Account') }}
                </x-button>
            </form>
        @endunless

        @if (session('success'))
            <p style="color: rgb(0, 87, 28);">{{ session('success') }}</p>
        @endif

    </x-authentication-card>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        section.back {
            position: relative;
        }

        section.back::before {
            position: absolute;
            content: '';
            left: 0px;
            top: 50px;
            width: 593px;
            height: 352px;
            z-index: ;
            background-image: url({{ asset('images/testimonials-left-dec.png') }});


        }

        section.back::after {
            position: absolute;
            content: '';
            right: 0px;
            bottom: 50px;
            width: 632px;
            height: 352px;
            z-index: ;
            background-image: url({{ asset('images/testimonials-right-dec.png') }});

        }
    </style>
</head>

<body>



    <section class="vh-100 back" style="background-color: #212529; ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem; z-index: 2;  box-shadow: 0 0 15px 0 rgba(255, 255, 255, 0.569);">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('img/login.jpg') }}"
                                    alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem; width: 100%; margin-top: 30%" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            {{-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> --}}
                                            <span class=" fw-bold mb-0" style="margin:auto"><img
                                                    src="{{ asset('img/logo.png') }}" alt="..." /></a>
                                            </span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email" value="{{ __('Email') }}">Email
                                                address</label>
                                            <input id="email" type="email" name="email" :value="old('email')"
                                                required autofocus autocomplete="username"
                                                class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password"
                                                value="{{ __('Password') }}">Password</label>
                                            <input id="password" type="password" name="password" required
                                                autocomplete="current-password"class="form-control form-control-lg" />
                                        </div>

                                        <div class="block mt-4">
                                            <label for="remember_me" class="flex items-center">
                                                <x-checkbox id="remember_me" name="remember" />
                                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>

                                        <div class="row mt-3">

                                            <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="pt-2">

                                                    <x-button class="btn btn-dark btn-lg btn-block">
                                                        {{ __('Log in') }}
                                                    </x-button>
                                                </div>
                                            </div>

                                            <div class="col-lg-8 col-sm-6 mb-4">
                                                <p class="mt-4 pb-lg-2" style="color: #393f81;">Don't have an account?
                                                    <a href="{{ route('register') }}" style="color: #393f81;">Register
                                                        here</a>
                                                </p>
                                            </div>


                                            {{-- <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif --}}


                                        </div>










                                    </form>


                                    <div class="container">
                                        @if (session('error'))
                                            <p style="color: red;">{{ session('error') }}</p>


                                            @unless (Auth::check() && Auth::user()->is_active)
                                                <form method="POST" action="{{ route('activate-account') }}">
                                                    @csrf


                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6 mb-4">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label" for="email"
                                                                    value="{{ __('Email') }}">Email
                                                                    address</label>
                                                                <input id="email" type="email" name="email" required
                                                                    autofocus autocomplete="username"
                                                                    class="form-control form-control-lg" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6 mb-4">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label" for="password">Password</label>
                                                                <input id="password" type="password" name="password"
                                                                    required
                                                                    autocomplete="current-password"class="form-control form-control-lg" />
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <x-button type="submit" class="btn btn-dark btn-lg btn-block">
                                                        {{ __('Activate Account') }}
                                                    </x-button>
                                                    {{-- <div class="mb-4">

                                                        
                                                    </div> --}}

                                                </form>
                                            @endunless
                                        @endif
                                        @if (session('success'))
                                            <p style="color: rgb(0, 87, 28);">{{ session('success') }}</p>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
