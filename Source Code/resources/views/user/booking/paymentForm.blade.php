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

                <!-- Content -->
                <div class="container"><br>
                    <div class="text-center">
                        <h1>Bill Pesanan yang harus di Bayar!</h1>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nama:</th>
                                        <td>{{ $order->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Kamar:</th>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori Kamar:</th>
                                        <td>{{ $order->kategori_kamar }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Check-in:</th>
                                        <td>{{ $order->tanggal_checkin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Check-out:</th>
                                        <td>{{ $order->tanggal_checkout }}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga:</th>
                                        <?php
                                        $checkin = new DateTime(date('Y-m-d', strtotime($order->tanggal_checkin)));
                                        $checkout = new DateTime(date('Y-m-d', strtotime($order->tanggal_checkout)));
                                        $selisihHari = $checkout->diff($checkin)->days + 1;
                                        $harga = $order->room->category->price;
                                        $totalHarga = $selisihHari * ($order->room->category->price ?? old('category->price'));
                                        ?>
                                        <td><strong class="text-primary">Rp.{{ number_format($totalHarga, 2, ',', '.') }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <h5>Alamat Pembayaran: </h5>
                                    <tr>
                                        <th>Nomor Rekening: </th>
                                        <td>0820987275</td>
                                    </tr>
                                    <tr>
                                        <th>Atas nama:</th>
                                        <td>Jogi Simanjuntak</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Dana: </th>
                                        <td>08116201460</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('submit.payment', $order->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
                                @csrf
                                <div class="form-group">
                                    <label for="gambar_pembayaran">Masukkan Gambar Bukti Pembayaran:</label>
                                    <input type="file" name="gambar_pembayaran" id="gambar_pembayaran" class="form-control-file">
                                    @error('gambar_pembayaran')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <form action="{{ route('user.booking.cancel', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Batalkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


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
                <!-- Content end -->

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