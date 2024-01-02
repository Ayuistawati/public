<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data WNI</title>

    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-topic-listing.css') }}">
    <!-- Add other CSS files if necessary -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body id="top">

    <main>
    <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/beranda') }}">
                    <i class="bi-back"></i>
                    <span>IDKu</span>
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('#section_1') }}">Home</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ route('logout') }}">Logout</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('#section_5') }}">Contact</a>
                        </li>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">Data Kependudukan WNI</h1>
                        <h6 class="text-center">Platform Data Warga Negara Indonesia</h6>
                        <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1"></span>
                                <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Data, Agama..." aria-label="Search">
                                <button type="submit" class="form-control">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Section -->
        <section class="featured-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                                <div class="d-flex">
                                    <div>
                                    <a href="{{ route('detail.master') }}"><h5 class="mb-2">Master Data</h5></a> 
                                        <p class="mb-0">----</p>
                                    </div>
                                </div>
                                <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="custom-block custom-block-overlay">
                            <div class="d-flex flex-column h-100">
                                <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="custom-block-overlay-text d-flex">
                                    <div>
                                    <a href="{{ route('detail.transaksi') }}"><h5 class="mb-2"><h5 class="text-white mb-2">Data Kependudukan</h5></a> 
                                        <p class="text-white">---</p>
                                    </div>
                                </div>
                                <div class="section-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section section-padding" id="section_4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-5 col-12">
                        <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                    </div>
                    <div class="col-lg-6 col-12 m-auto">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Apa Itu Aplikasi IDKu?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    Aplikasi "IDKu" adalah sebuah platform digital yang dirancang untuk memberikan akses mudah dan aman terhadap informasi identitas kewarganegaraan. Dengan IDKu, pengguna dapat dengan cepat memverifikasi dan mengelola data pribadi mereka, termasuk status kewarganegaraan, melalui antarmuka yang user-friendly.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Kegunaan Aplikasi IDKu ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    Aplikasi ini memungkinkan pengguna untuk mengakses informasi identitas mereka secara efisien, menjadikannya alat yang berguna dalam berbagai konteks, seperti transaksi perbankan, kepegawaian, atau layanan publik.                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>


    <!-- Footer -->
    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="index.html">
                        <i class="bi-back"></i>
                        <span>IDKu</span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <h6 class="site-footer-title mb-3">Resources</h6>
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Home</a>
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">FAQs</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Information</h6>
                    <p class="text-white d-flex mb-1">
                        <a href="tel: 305-240-9671" class="site-footer-link">082340571151</a>
                    </p>
                    <p class="text-white d-flex">
                        <a href="mailto:info@company.com" class="site-footer-link">indonesia@company.com</a>
                    </p>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Indonesian
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Thai</button></li>
                            <li><button class="dropdown-item" type="button">Myanmar</button></li>
                            <li><button class="dropdown-item" type="button">Arabic</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
