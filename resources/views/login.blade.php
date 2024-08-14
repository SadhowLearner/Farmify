<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Farmify</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])


</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container-fluid">
        <div class="row d-flex flex-row justify-content-center w-100">
            <div class="col-8 w-100 ">
                <nav class="navbar bg-body-tertiary row">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="assets/logo.png" alt="Logo" height="55" class="d-inline-block">
                            <span class="mt-5 color-third pb-5 fs-4">
                                Farmify
                            </span>
                        </a>
                    </div>
                </nav>
                <form action="" class="justify-content-center ms-5 row d-flex flex-column w-50">
                    <div class="text-center">
                        <h5>Halo, Selamat Datang</h5>
                        <p class="text-base">Masukkan Informasi Login di Bawah</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukkan Username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kata Sandi</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukkan Kata Sandi">
                    </div> 
                    <p class="text-base text-success text-end">Lupa Kata Sandi?</p> 
                    <button class="btn btn-success text-white btn-lg">
                        Masuk
                    </button>
                    <p class="text-base text-gray-500 text-center my-5"> Atau Masuk dengan Google</p>
                    <button class="btn btn-light">
                        <img src="assets/google.png" alt="" height="35px">
                        <span class="text black">Google</span>
                    </button>
                </form>
            </div>

            <img src="assets/login_banner.png" class="col-4 vh-100 position-absolute end-0 p-0 m-0" alt="">

        </div>
    </div>
</body>

</html>