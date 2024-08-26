<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Small Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container px-5">
            <a class="navbar-brand" href="#">
                <img src="assets/logo.png" alt="Logo" height="55" class="d-inline-block">
                <span class="mt-5 color-third pb-5 fs-4">
                    Farmify
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>
                    <li class="nav-item"><a href="{{ url('/login') }}" class="btn btn-success">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0 " src="assets/egg_home.jpg" alt="..." />
            </div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Temukan Hasil Ternak Berkualitas dari Peternak Lokal</h1>
                <p>Belanja telur, susu, daging, dan produk ternak lainnya langsung dari peternak terpercaya di seluruh
                    Indonesia. Kumpulkan poin dan tukarkan dengan hadiah menarik</p>
                <div class="d-flex flex-row">
                    <a class="btn btn-success" href="#!">Mulai Belanja</a>
                    <a class="btn btn-outline-success mx-3" href="#!">Daftar Sekarang</a>
                </div>
            </div>
        </div>
        <!-- Call to Action-->
        <div class="card text-white bg-transparent rounded-pill my-5 py-4 text-center">
            <div class="card-body m-4">
                <h1 class="montserrat color-third">Kenapa Farmify?</h1>
                <p class="text-dark m-0">Farmify adalah platform marketplace yang memungkinkan Anda untuk membeli produk
                    ternak segar langsung dari peternak lokal. Kami memastikan setiap produk yang Anda terima adalah
                    yang terbaik, dari tangan peternak ke meja makan Anda. Selain itu, nikmati pengalaman belanja yang
                    lebih menyenangkan dengan sistem poin kami—belanja lebih banyak, dapatkan lebih banyak hadiah!</p>
            </div>
        </div>
        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <div class="card  mx-5 my-5 border-0">
                <div class="row g-0 d-flex align-items-center">
                    <div class="col-md-4">
                        <img src="assets/milk.jpg" class="img-fluid rounded-5" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ms-5 ">
                            <h3 class="card-title montserrat color-third">Produk Ternak Segar dan Berkualitas</h3>
                            <p class="card-text roboto-light">Produk yang segar dan Berkualitas. Tidak perlu kahwatir tentang kualitas produk yang ada di Farmify</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  mx-5 my-5 border-0">
                <div class="row g-0 d-flex align-items-center">
                    <div class="col-md-8">
                        <div class="card-body me-5 ">
                            <h3 class="card-title montserrat color-third text-end">Mendukung Peternak Lokal</h3>
                            <p class="card-text roboto-light text-end">Produk yang anda beli bisa mendukung peternak lokal lebih maju</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="assets/milk_farmer.jpg" class="img-fluid rounded-5" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <!-- Section -->
        <section class="d-flex flex-row justify-content-center mt-5">
            
            <div class="card  mx-5 my-5 border-0">
                <div class="row g-0 d-flex align-items-center">
                    <div class="col-md-4">
                        <img src="assets/meat.jpg" class="img-fluid rounded-5" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ms-5">
                            <h1 class="card-title montserrat color-third">Tunggu Apa Lagi ayo Belanja Sekarang di Farmify</h1>
                            <p class="card-text roboto-light">Kamu akan mendapatkan poin untuk ditukar jika berbelanja di Farmify</p>
                            <button class="btn btn-lg btn-success p-2 w-100">Belanja Sekarang!</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    @Vite(['resources/js/app.js'])
</body>

</html>