<style>
    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem; /* Adjust as needed */
    }

    .nav-left {
        display: flex;
        align-items: center;
    }

    .nav-left i {
        margin-right: 1rem; /* Adjust as needed */
    }

    .nav-right {
        display: flex;
        align-items: center;
        margin-left: auto;
    }

    .nav-right .profile img {
        margin-left: 0.5rem; /* Adjust as needed */
    }
</style>

<nav>
    <div class="nav-left">
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">{{ Auth::user()->role->name }}</a>
    </div>
    <div class="nav-right">
        {{-- <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label> --}}
        <a href="{{ route('dashboard') }}" class="profile">
            @if (Storage::exists('public/user/' . Auth::user()->ktp))
                <img src="{{ asset('storage/user/' . Auth::user()->ktp) }}" alt="{{ Auth::user()->ktp }}">
            @else
                <img src="{{ asset('storage/user/blank_profile.jpg') }}" alt="blank_profile">
            @endif
        </a>
    </div>
</nav>
