<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kost Minur</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            {{-- <a class="navbar-brand" href="#!">YayaMotor</a> --}}
            <a href="{{route('landing')}}" class="brand">
                <i class='bx bxs-building-house'></i>
                <span class="text">Kost Minur</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                </ul>
                <div class="d-flex">
                    @if (Auth::user())
                    <a href="{{route('dashboard')}}" class="btn ms-1 dashboard">
                        <i class='bx bxs-dashboard me-1' ></i>
                        Dashboard
                    </a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn ms-1 logout">
                            <i class='bx bx-log-out me-1' ></i>
                            <span> Log out </span>
                        </button>
                    </form>
                    @else
                    <a href="{{route('login')}}" class="btn ms-1 dashboard">
                        <i class='bx bx-log-in me-1' ></i>
                        Log in
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- room section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/room/' . $room->foto) }}" alt="..." />
                </div>
                <div class="col-md-6">
                    <div class="small mb-1">Ukuran kamar : {{$room->ukuran}}</div>
                    <h1 class="display-5 fw-bolder">Kamar No. {{ $room->nomor }}</h1>
                    <div class="fs-5 mb-4">
                        <span>Rp.{{ number_format($room->harga, 0) }}</span>
                    </div>

                    <div class="fs-6 mb-3">
                        <strong>Fasilitas:</strong>
                        @if($room->facilities->count() > 0)
                            <ul>
                                @foreach($room->facilities as $facility)
                                    <li>{{ $facility->nama }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>-</p> <!-- Jika tidak ada fasilitas -->
                        @endif
                    </div>

                    <!-- Tambahan Include -->
                    <div class="fs-6 mb-3">
                        <strong>Include:</strong> Wifi, Kasur, Bantal, Kamera CCTV, Air, listrik, Colokan Listrik, Dapur Bersama, dan Parkiran Motor
                    </div>

                    <div class="d-flex">
                        <a class="btn btn-secondary flex-shrink-0 me-2" href="{{url()->previous()}}">
                            <i class='bx bx-arrow-back me-1'></i>
                            Back
                        </a>
                        @if (Auth::user()->role->name == 'penyewa' || Auth::user()->role->name == 'penguji')
                            <a class="btn btn-primary" href="{{ route('transaction.create', $room->id) }}">Rent Now</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related rooms</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($related as $room)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- room image-->
                            <img class="card-img-top" src="{{ asset('storage/room/' . $room->foto) }}" alt="..." />
                            <!-- room details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- room name-->
                                    <a href="{{ route('room.show', ['id' => $room->id]) }}" style="text-decoration: none" class="text-dark">
                                        <h5 class="fw-bold" >{{ $room->nomor }}</h5>
                                        <small class="px-2 bg-warning rounded-4" >{{$room->ukuran}}</small>
                                    </a>
                                    <!-- room price-->
                                    <p class="text-primary mt-2">
                                        Rp. {{ number_format($room->harga, 0) }},-
                                    </p>
                                </div>
                            </div>
                            <!-- room actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-success" href="https://wa.me/6289627543832"><i class='bx bxl-whatsapp me-1'></i>Order Now</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-light-dark" id="about">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brand">
                        <i class='bx bxs-building-house'></i>
                        <span class="text">Kost Minur</span>
                    </div>
                    <p class="me-4 text-white">Kost Minur menyediakan hunian nyaman dan strategis dengan fasilitas lengkap dan lingkungan yang aman. Tempat ideal bagi mahasiswa dan pekerja yang mencari tempat tinggal tenang dan bersahabat.</p>
                </div>
                <div class="col">
                    <div class="d-flex">
                        <i class='bx bxs-map text-white me-2'></i>
                        <p class="text-white" >jl. Koto luar, Kec. Pauh, Depan Pos Pemuda Gendmudtaka</p>
                    </div>
                    <p class="text-white" >Develop by Fitrah Amaliah Muis </p>
                    <a href="https://github.com/fitrahsvt"><i class='bx bxl-github text-white fs-1'></i></a>
                    <a href="https://www.linkedin.com/in/fitrah-amaliah-muis-516544267/"><i class='bx bxl-linkedin text-white fs-1'></i></a>
                    <a href="https://www.instagram.com/fitrahamaliahm/"><i class='bx bxl-instagram text-white fs-1'></i></a>
                    <a href="mailto:fitrahamaliahmuis@gmail.com"><i class='bx bxs-envelope text-white fs-1'></i></a>
                </div>
            </div>
            <hr class="text-white">
            <p class="m-0 text-center text-white">Copyright &copy; Kost Minur 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
