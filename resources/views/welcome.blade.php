<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Endog Ceplok</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
</head>

<body class="tw-font-sans tw-overflow-x-hidden">
    <div class="tw-container tw-w-screen">

        <nav class="tw-navbar tw-w-screen tw-bg-white-100">
            <div class="tw-navbar-start">
                <div class="tw-dropdown">
                    <div tabindex="0" role="button" class="tw-btn tw-btn-ghost lg:tw-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-5 tw-w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0"
                        class="tw-menu tw-menu-sm tw-dropdown-content tw-bg-slate-100 tw-rounded-box tw-z-[1] tw-mt-3 tw-w-52 tw-p-2 tw-shadow">
                        <li><a>Home</a></li>
                        <li>
                            <a>Tentang</a>
                            <ul class="tw-p-2">
                                <li><a>Developer</a></li>
                                <li><a>Company</a></li>
                            </ul>
                        </li>
                        <li><a>Kontak</a></li>
                    </ul>
                </div>
                <a class="tw-btn tw-btn-ghost tw-text-xl">

                    <img src="assets/logo.png" class="tw-h-[120%]" alt="">
                    Endog Ceplok

                </a>
            </div>
            <div class="tw-navbar-center tw-hidden lg:tw-flex">
                <ul class="tw-menu tw-menu-horizontal tw-px-1">
                    <li><a>Home</a></li>
                    <li>
                        <details>
                            <summary>Tentang</summary>
                            <ul class="tw-p-2 tw-bg-slate-100">
                                <li><a>Developer</a></li>
                                <li><a>Company</a></li>
                            </ul>
                        </details>
                    </li>
                    <li><a>Kontak</a></li>
                </ul>
            </div>
            <div class="tw-navbar-end ">


                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="tw-btn tw-btn-success tw-text-slate-100">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="tw-btn tw-btn-success  tw-text-slate-100 me-3">Ayo Mulai</a>
                    @endauth
                @endif

            </div>
        </nav>

        <!-- Page Content-->
        <section class="tw-hero tw-w-screen tw-mt-3 tw-min-h-screen">
            <div class="tw-hero-content tw-text-center ">
                <div class="tw-w-[75%]">
                    <h1 class="tw-text-5xl tw-font-bold tw-font-poppins">Selamat Datang di Endog Ceplok POS</h1>
                    <p class="tw-py-6 tw-font-sans mt-4 tw-line-height-3">
                        Kelola produk unggas Anda dengan mudah dan efisien. Permudah inventaris, pantau penjualan, dan
                        kembangkan bisnis Anda tanpa repot. Biarkan sistem kami menangani tugas-tugas berat, sehingga
                        Anda
                        bisa fokus pada hal yang lebih penting.
                    </p>
                    <a href="{{ route('login') }}"
                        class="tw-btn tw-btn-success tw-mt-3 tw-btn-lg  tw-text-neutral-50 tw-rounded-full">Mulai
                        Kelola Toko Anda</a>

                    
                        {{-- card --}}

                    <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 md:tw-grid-cols-3 lg:tw-grid-cols-5 tw-gap-4">

                        @for ($i = 0; $i < 5; $i++)    
                        <div class="tw-card tw-card-bordered mx-2 tw-mt-8 tw-bg-slate-100 tw-w-42 tw-shadow-xl">
                            <figure class="tw-w-full">
                                <img src="assets/egg-product.jpg"
                                    alt="Shoes" class="tw-rounded-xl tw-w-[32em]" />
                            </figure>
                            <div class="tw-card-body">
                                <h2 class="tw-card-title tw-text-center">Telur</h2>
                                <div class="tw-flex tw-flex-row">
                                    <p class="tw-text-sm tw-card-text tw-text-left mt-2 tw-text-gray-600"><b>24.000</b></p>
                                    <div class="tw-card-actions tw-justify-end">
                                        <button class="tw-btn tw-btn-success tw-text-white tw-btn-sm">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="tw-footer tw-bg-success tw-text-neutral-content tw-p-10">
        <aside>
            <div class="tw-flex flex-col">

                <img src="assets/logo.png" class="tw-h-24" class="" alt="">
                <span class="h4 tw-font-poppins tw-mt-1 tw-pt-1">Endog <br> Ceplok</span>
            </div>
            <p>
                Created by @ShadowCoder
            </p>
        </aside>

        <nav>
            <h6 class="tw-footer-title">Services</h6>
            <a class="tw-link tw-link-hover">Branding</a>
            <a class="tw-link tw-link-hover">Design</a>
            <a class="tw-link tw-link-hover">Marketing</a>
            <a class="tw-link tw-link-hover">Advertisement</a>
        </nav>
        <nav>
            <h6 class="tw-footer-title">Company</h6>
            <a class="tw-link tw-link-hover">About us</a>
            <a class="tw-link tw-link-hover">Contact</a>
            <a class="tw-link tw-link-hover">Jobs</a>
            <a class="tw-link tw-link-hover">Press kit</a>
        </nav>
        <nav>
            <h6 class="tw-footer-title">Legal</h6>
            <a class="tw-link tw-link-hover">Terms of use</a>
            <a class="tw-link tw-link-hover">Privacy policy</a>
            <a class="tw-link tw-link-hover">Cookie policy</a>
        </nav>

        <nav class="tw-grid tw-grid-rows-2 tw-grid-flow-col">
            <h6 class="tw-footer-title">Social</h6>
            <div class="tw-grid tw-grid-flow-col tw-gap-4">
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="tw-fill-current">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="tw-fill-current">
                        <path
                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="tw-fill-current">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg>
                </a>
            </div>
        </nav>

    </footer>

    @Vite(['resources/js/app.js'])
</body>

</html>
