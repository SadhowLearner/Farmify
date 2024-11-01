<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body class="tw-font-sansantialiased tw-bg-green-600 lg:tw-overflow-hidden d-flex align-items-center">
    <div class="container lg:tw-min-h-screen d-flex flex-lg-row flex-sm-column justify-content-lg-center align-items-lg-center p-5">
        <section class="col-12 col-md-7 col-xl-7">
            <div class="d-flex ms-3 text-white">
                <div class="col-12 col-xl-9">
                    <div class="d-flex position-relative -tw-start-12 flex-row ms-0">
                        <img class="rounded mb-4 tw-h-36 pt-6" loading="lazy" src="assets/logo.png" height="35px"
                            alt="Farmify Logo">
                        <span class="display-1">Endog</span>
                    </div>

                    <h2 class="h1 mb-4">Kita mendukung para peternak lokal</h2>
                    <p class="lead mb-5">Beli telur, susu, daging, dan hasil ternak dari penjual lokal</p>
                    <div class="text-endx">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                            <path
                                d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </div>
                </div>
            </div>


        </section>
        {{-- Card Form --}}
        <aside class="col-12 col-md-5 col-xl-5 ">
            <div class="card border-0 rounded-4">
                <div class="card-body p-3 p-md-4 p-xl-5 ">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-4">
                                <h3>{{ Request::routeIs('register') ? 'Daftar' : 'Log In' }}</h3>
                                <p>{{ Request::routeIs('register') ? 'Sudah Memiliki Akun?' : 'Tidak Memiliki Akun?' }}
                                    <a
                                        href="{{ Request::routeIs('register') ? route('login') : route('register') }}">{{ Request::routeIs('register') ? 'Log In' : 'Daftar' }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    {{ $slot }}

                </div>
            </div>
        </aside>



    </div>

</body>

</html>
