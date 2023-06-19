<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lago Hotel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/x-icon" href="img/lambang.png" />
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset ('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset ('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
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
                                <a href="{{ route('category.room') }}" class="nav-item nav-link">Kamar</a>
                                <a href="{{ route('user.orders.index') }}" class="nav-item nav-link active">Daftar Pesanan</a>
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
        <h1>Booking</h1>
        <div clas="col-md-6 offset-md-3 mt-4 p-4 text-center">
            <form action="{{route('booking.store')}}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @csrf
                            <input type="hidden" name="category_id" value="{{ $room->category->id ?? '' }}">
                            <input type="hidden" name="room_id" value="{{ $room->id ?? '' }}">
                            <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">

                            <div class="form-group mb-3">
                                <label for="name">Nama Kamar:</label>
                                <input type="text" name="name" id="name" value="{{ $room->name ?? old('name') }}" class="form-control" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kategori_kamar">Kategori Kamar:</label>
                                <input type="text" name="kategori_kamar" id="kategori_kamar" value="{{ $room->category->name ?? old('category->name ') }}" class="form-control" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_checkin">Tanggal Check-in:</label>
                                <input type="date" name="tanggal_checkin" id="tanggal_checkin" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_checkout">Tanggal Check-out:</label>
                                <input type="date" name="tanggal_checkout" id="tanggal_checkout" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer Start -->
        <br><br><br><br><br><br><br>
        <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-4">
                            <a href="">
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