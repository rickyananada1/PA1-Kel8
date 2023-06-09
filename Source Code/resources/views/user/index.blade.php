<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lago Hotel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/x-icon" href="img/lambang.png" />
    <meta property="og:type" content="website" />
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
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                                <a href="{{ route('show.dashboard.pelanggan') }}" class="nav-item nav-link active">Home</a>
                                <a href="{{ route('category.room') }}" class="nav-item nav-link">Kamar</a>
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

        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('img/Latar depan2.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Lago Hotel</h6>
                                <h1 class="display-4 text-white mb-4 animated slideInDown">Temukan Ketenangan dan Kenyamanan Seperti di Rumah Anda Sendiri</h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/latarcafe.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Lago Hotel</h6>
                                <h1 class="display-4 text-white mb-4 animated slideInDown">Temukan Ketenangan dan Kenyamanan Seperti di Rumah Anda Sendiri</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Menampilkan notifikasi kepada pengguna -->
            @auth
            @if ($notifications !== null && $notifications->count() > 0)
            @foreach($notifications as $notification)
            <div class="alert alert-info @if($notification->status === 'read') d-none @endif" id="notification-{{ $notification->id }}">
                {{ $notification->message }}
                <a class="btn btn-primary" href="{{ route('user.notifications.markAsRead', ['id' => $notification->id]) }}">Lihat</a>
            </div>
            @endforeach
            @endif
            @endauth
        </div>
    </div>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h6 class="section-title text-start text-primary">Take a piece</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Lago Hotel</span></h1>
                    <p class="mb-4">Kenyamanan dan kebahagiaan anda merupakan prioritas utama kami</p>
                    <div class="row g-3 pb-4">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-hotel fa-2x text-primary mb-2" style="font-size: 64px;"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{ $jumlahKamar}}</h2>
                                    <p>Jumlah</p>
                                    <p>Kamar</p>
                                    <p><a href="{{ route('category.room') }}">Lihat >></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="bi bi-check-circle text-primary mb-2" style="font-size: 48px;"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{ $availableRooms }}</h2>
                                    <p>{{ now()->format('d F Y') }}:</p>
                                    <p>Kamar Tersedia</p>
                                    <p><a href="{{ route('category.room') }}">Pesan Sekarang</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/resto2.jpg" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/FamilyRoom.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/Tampilan Home.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/pantai.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Video Start -->
    <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
        <div class="row g-0">
            <div class="col-md-6 bg-dark d-flex align-items-center">
                <div class="p-5">
                    <h6 class="section-title text-start text-white text-uppercase mb-3">Lago Cafe And Restaurant</h6>
                    <h1 class="text-white mb-4">Cintai dengan baik. Tidur nyenyak. Makan dengan baik.</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="video">
                    <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Mengapa Harus Hotel Kami?</h6>
                <h1 class="mb-5">Mari lihat &nbsp;<span class="text-primary text-uppercase">Kelebihan Kami</span></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item rounded">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-hotel fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Rooms</h5>
                        <p class="text-body mb-0">Menawarkan kenyamanan dan ketenangan seperti dirumah Sendiri dengan harga yang terjangkau </p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <a class="service-item rounded">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Food</h5>
                        <p class="text-body mb-0">Menyediakan Sarapan <b>Gratis</b> yang Diantar Langsung ke Kamar Anda</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item rounded">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-spa fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">View</h5>
                        <p class="text-body mb-0">Menawarkan Pemandangan dan View yang Indah dan Menarik Saat Anda Terbangun dari Tidur Anda Dipagi Hari Maupun Malam Hari</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <a class="service-item rounded">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-swimmer fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Sports</h5>
                        <p class="text-body mb-0">Terdapat sarana olahraga untuk anda yang berjoging,karena daerah yang sangat indah dan nyaman untuk melakukan joging</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item rounded">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-glass-cheers fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Restaurant</h5>
                        <p class="text-body mb-0">Memiliki restoran yang terdapat tepat di depan hotel yang dapat anda kunjungi jika anda ingin mencoba kuliner asli daerah <b>Toba</b></p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <a class="service-item rounded">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">PLACE</h5>
                        <p class="text-body mb-0">Lokasi yang strategis yang berhadapan langsung dengan pantai untuk rekreasi dan pemandangan pedesaan yang indah.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

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

    <!-- Footer Start -->
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
    </div>

    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="{{ route('show.dashboard.pelanggan') }}" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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