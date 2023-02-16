<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'E-Shop'))</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/svg+xml" href="{{asset('favicon.svg')}}">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0/dist/themes/light.css"/>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0/dist/shoelace.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.1/dist/full.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
        module.exports = {
            plugins: [require("@tailwindcss/typography"), require("daisyui")],
            daisyui: {
                styled: true,
                themes: true,
                base: true,
                utils: true,
                logs: true,
                rtl: false,
                prefix: "",
                darkTheme: "dark",
            },
        }
    </script>

    <link rel="stylesheet" href="{{asset('/css/app.css')}}"/>
    <script type="module" src="{{asset('/js/mano.js')}}"></script>
</head>
<body>

<x-auth-session-status class="mb-4" :status="session('status')"/>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Login now!</h1>
                <div class="py-6">
                    Sveikas, mielas lankytojau! Nori prisijungti prie administratoriaus panelės? Tuomet turi atlikti
                    šiuos veiksmus:
                    <br>
                    <br>
                    <ul>
                        <ol> - Pabandykite atsistoti ant galvos ir sudainuok savo mėgstamą dainą aukščiausiu balsu, o tuo
                            pačiu
                            metu sukti apskritimais kairėn.
                        </ol>
                        <ol> - Susiraskite 10 žalių kiaušinių ir 10 žalių pomidorų. Tuomet pabarstykite kiaušinius
                            pomidorais
                            ir supakuokite į dovanų dėžę. Dovanų dėžę atsiųskite man ir paskambinkite, kai ją gausiu.
                        </ol>
                        <ol> - Patraukite ant savęs kaktą ir pasakykite "Pilypas Pilkauskas puola piliakalnę papietauti!"
                            penkis kartus iš eilės. Jei pajusite didelį troškulį, tai reiškia, kad prisijungimas pavyko.
                        </ol>
                    </ul>
                    <br>
                    Tikiuosi, kad mūsų keisti reikalavimai jums suteikė šiek tiek juoko ir padarė dieną šviesesnę. O
                    dabar
                    rimtai, prašome prisijungti su savo prisijungimo vardu ir slaptažodžiu ir mes su malonumu padėsime
                    jums
                    spręsti jūsų problemas.
                </div>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <div class="card-body">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">{{__('Email')}}</span>
                        </label>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                      :value="old('email')" required autofocus autocomplete="username"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">{{__('Password')}}</span>
                        </label>
                        <x-text-input id="password" class="input input-bordered"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password"/>

                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>

                        <label class="label">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                   href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </label>
                    </div>
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                   name="remember">
                            <span
                                class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
