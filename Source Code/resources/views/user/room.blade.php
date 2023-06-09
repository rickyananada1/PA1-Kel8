<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lago Hotel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/x-icon" href="img/lambang.png" />
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="{{ route('show.dashboard.pelanggan') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Lago Hotel</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">Lagohotel18@gmail.com</p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">(+62) 8116201460 </p>
                            </div>
                        </div>
                        <!--Icon Medsos-->
                        <div class="col-lg-5 px-5 text-end">
                            <div class="d-inline-flex align-items-center py-2">
                                <a class="me-3" href="https://www.facebook.com/profile.php?id=100063664386180"><i class="fab fa-facebook-f"></i></a>
                                <a class="me-3" href="https://www.instagram.com/lagoshotelandresto/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="{{ route('show.dashboard.pelanggan') }}" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Lago Hotel</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="{{ route('show.dashboard.pelanggan') }}" class="nav-item nav-link">Home</a>
                                <a href="{{ route('category.room') }}" class="nav-item nav-link active">Kamar</a>
                                <a href="{{ route('user.orders.index') }}" class="nav-item nav-link">Daftar Pesanan</a>
                                <a href="{{ route('testimonies.create') }}" class="nav-item nav-link">Buat Testimoni</a>
                                <a href="{{ route('testimonies.showAll') }}" class="nav-item nav-link">Lihat Testimoni</a>


                            </div>
                            @if (!Auth::check())
                            <a class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block" href="{{ route('userlogin') }}">Masuk<i class="fa fa-arrow-right ms-3"></i></a>
                            @else
                            <form id="logout-form" action="{{ route('userlogout') }}" method="POST">
                                @csrf
                                <a class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block" onclick="confirmLogout()">Keluar<i class="fa fa-arrow-right ms-3"></i></a>
                            </form>
                            @endif

                            <script>
                                function confirmLogout() {
                                    if (confirm("Apakah Anda yakin ingin keluar?")) {
                                        // Jika pengguna memilih "OK" pada kotak dialog konfirmasi, submit form logout.
                                        document.getElementById('logout-form').submit();
                                    }
                                    // Jika pengguna memilih "Cancel" pada kotak dialog konfirmasi, tidak melakukan apa-apa.
                                }
                            </script>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">List Kamar</h1>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Room Start -->
        <div class="container">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
                </div>

                <div class="row justify-content-center">
                    @foreach($categories as $category)
                    <div class="col-lg-4">
                        <div class="room-item shadow rounded overflow-hidden mb-4 mx-auto" style="width: 75%;">
                            <div class="image-container" style="width: 100%; height: 200px; overflow: hidden;">
                                <a data-toggle="modal" data-target="#imageModal{{$category->id}}">
                                    <img src="{{ asset('storage/'.$category->gambar_kategori) }}" class="img-fluid" alt="Category Image" style="width: 100%; height: 100%; object-fit: cover;">
                                </a>
                            </div>
                            <div class="p-4 mt-2">
                                <h5 class="text-center">{{ $category->name }}</h5>
                                <div class="price text-primary text-center">Rp.{{ $category->price }},00/Malam</div>
                                <ul class="facilities">
                                    <li><i class="fas fa-tv mr-2"></i>Televisi</li>
                                    <li><i class="fas fa-shower mr-2"></i>Kamar mandi</li>
                                    <li><i class="fas fa-snowflake mr-2"></i>AC</li>
                                    <li><i class="fas fa-wifi mr-2"></i>Free WIFI</li>
                                </ul>
                                <div class="text-center">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('rooms.category', ['category' => $category->name]) }}">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                <!-- Newsletter Start -->
                <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 border rounded p-1">
                            <div class="border rounded text-center p-1">
                                <div class="bg-white rounded text-center p-5">
                                    <h4 class="mb-4">KEPUASAN ANDA <span class="text-primary text-uppercase">KEBAHAGIAAN KAMI</span></h4>
                                    <div class="position-relative mx-auto" style="max-width: 400px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Newsletter Start -->


                <!-- Footer Start -->
                <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
                    <div class="container pb-5">
                        <div class="row g-5">
                            <div class="col-md-6 col-lg-4">
                                <div class="bg-primary rounded p-4">
                                    <a href="{{ route('show.dashboard.pelanggan')}}">
                                        <h1 class="text-white text-uppercase mb-3">Lago Hotel</h1>
                                    </a>
                                    <p>
                                        <a class="text-dark fw-medium">KEPUASAN , KESENANGAN, DAN KENYAMANAN ANDA ADALAH KEBAHAGIAAN KAMI</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Info</h6>
                                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Sibola Hotang, Sibola Hotangsas, Toba, Sumatera Utara 22312</p>
                                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i> (+62) 8116201460 </p>
                                <p class="mb-2"><i class="fa fa-envelope me-3"></i>Lagohotel18@gmail.com</p>
                                <div class="d-flex pt-2">
                                    <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/profile.php?id=100063664386180"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/lagoshotelandresto/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer End -->


                <!-- Back to Top -->
                <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
            </div>

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
            <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
            <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
            <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
            <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
            <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
            <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>