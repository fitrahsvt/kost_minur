<section id="sidebar">
    <a href="{{route('landing')}}" class="brand">
        <i class='bx bxs-building-house'></i>
        {{-- <i class='bx bxs-smile'></i> --}}
        <span class="text">Kost Minur</span>
    </a>
    <ul class="side-menu top">
        <li >
            <a href="{{route('dashboard')}}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
            <li>
                <a href="{{route('slider.index')}}">
                    <i class='bx bxs-doughnut-chart' ></i>
                    <span class="text">Slider</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'pemilik')
            <li>
                <a href="{{route('room.index')}}">
                    <i class='bx bxs-door-open'></i>
                    <span class="text">Kamar</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
            <li>
                <a href="{{route('facility.index')}}">
                    <i class='bx bxs-food-menu'></i>
                    <span class="text">Fasilitas</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'pemilik' || Auth::user()->role->name == 'admin')
            <li>
                <a href="{{route('user.index')}}">
                    <i class='bx bxs-group' ></i>
                    <span class="text">Pengguna</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'penyewa')
            <li>
                <a href="{{route('transaction.index')}}">
                    <i class='bx bx-transfer-alt'></i>
                    <span class="text">Tagihan</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
            <li>
                <a href="{{route('process.index')}}">
                    <i class='bx bx-transfer-alt'></i>
                    <span class="text">Proses Transaksi</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'pemilik' || Auth::user()->role->name == 'penyewa')
            <li>
                <a href="{{route('history.index')}}">
                    <i class='bx bx-history' ></i>
                    <span class="text">Riwayat Transaksi</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'pemilik')
            <li>
                <a href="{{route('expense.index')}}">
                    <i class='bx bxs-dollar-circle' ></i>
                    <span class="text">Pengeluaran</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'pemilik')
            <li>
                <a href="{{route('report.index')}}">
                    <i class='bx bxs-report' ></i>
                    <span class="text">Laporan Keuangan</span>
                </a>
            </li>
        @endif
    </ul>
    <ul class="side-menu">
        <li>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text" style="margin-left: 10px;">Logout</span>
                </button>
            </form>
        </li>
    </ul>



</section>
