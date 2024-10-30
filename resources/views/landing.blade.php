<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kost Minur</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Boxicons -->
	    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/landing.css')}}" rel="stylesheet" />
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
                        <li class="nav-item atas"><a class="nav-link" aria-current="page" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#product">Katalog</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">facility</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($facilities as $f)
                                <li><a class="dropdown-item" href="{{route('landing', ['facility' => $f->nama])}}">{{$f->nama}}</a></li>
                                @endforeach
                                <li><a class="dropdown-item" href="{{route('landing')}}">All</a></li>
                            </ul>
                        </li>
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
        {{-- Carousel --}}
        <div id="home" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                @foreach ($sliders as $slider)
                    <button type="button" data-bs-target="#home" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->first ? 'active' : '' }}"
                        aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide 1"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                        <img src="{{ asset('storage/slider/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->image }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->title }}</h5>
                            <p>{{ $slider->caption }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#home" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#home" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Section-->
        <section id="product">
            <div class="container px-4 px-lg-5 mt-5">
                {{-- Filter Harga --}}
                <form action="{{ route('landing') }}" method="GET">
                    <div class="row g-3 align-items-center mb-5">
                        <div class="col-auto">
                            <label class="col-form-label">Price</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Min" name="min" value="{{ old('min', $min) }}">
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Max" name="max" value="{{ old('max', $max) }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Terapkan</button>
                        </div>
                    </div>
                </form>

                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @forelse ($rooms as $room)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge position-absolute categorylanding" style="top: 0.5rem; right: 0.5rem">PUTRA</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/room/' . $room->foto) }}" alt="{{ $room->nomor }}" />

                            <!-- Product details-->
                            <div class="card-body pt-4 ">
                                <div >
                                    <!-- Product name-->
                                    <a href="{{ route('room.show', ['id' => $room->id]) }}" style="text-decoration: none" class="text-dark">
                                        <h5 class="fw-bold" >Kamar Nomor {{ $room->nomor }}</h5>
                                        <small class="px-2 bg-warning rounded-4" >Kamar {{ $room->ukuran }}</small>
                                    </a>
                                    <!-- Product price-->
                                    <p class="text-primary mt-2">
                                        Rp. {{ number_format($room->harga, 0) }},-/Bulan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-secondary w-100 text-center" role="alert">
                        <h4>We don't have product yet</h4>
                    </div>
                @endforelse
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
        {{-- <script src="js/scripts.js"></script> --}}
    </body>
</html>
