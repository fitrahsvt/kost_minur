<section id="sidebar">
    <a href="{{route('landing')}}" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">YayaMotor</span>
    </a>
    <ul class="side-menu top">
        <li >
            <a href="{{route('dashboard')}}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'staff')
        <li>
            <a href="{{route('slider.index')}}">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Slider</span>
            </a>
        </li>
        @endif
        <li>
            <a href="{{route('product.index')}}">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Products</span>
            </a>
        </li>
        @if (Auth::user()->role->name == 'admin')
        <li>
            <a href="{{route('user.index')}}">
                <i class='bx bxs-group' ></i>
                <span class="text">Users</span>
            </a>
        </li>
        @endif
    </ul>
    <ul class="side-menu">
        <li>
            {{-- <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form> --}}
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text" style="margin-left: 10px;">Logout</span>
                </button>
            </form>
            {{-- <a href="{{route('logout')}}" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a> --}}
        </li>
    </ul>



</section>
