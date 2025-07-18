<nav class="navbar navbar-expand-lg fixed-top shadow-sm" style="background-color: #ffe3ec;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="color: #d63384;">
            🏥 RS Viona
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto">
                {{-- ======= PUBLIC MENU ======= --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ route('home') }}" style="color: #d63384;">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dokter') ? 'active' : '' }}"
                        href="{{ route('public.dokter') }}" style="color: #d63384;">Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('jadwal') ? 'active' : '' }}"
                        href="{{ route('public.jadwal') }}" style="color: #d63384;">Jadwal Praktek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('reservasi') ? 'active' : '' }}"
                        href="{{ route('public.reservasi') }}" style="color: #d63384;">Reservasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}"
                        href="{{ route('public.kontak') }}" style="color: #d63384;">Kontak</a>
                </li>

                {{-- ======= ADMIN PANEL ======= --}}
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('admin*') ? 'active' : '' }}" href="#"
                                id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="color: #d63384;">
                                Admin Panel
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.dokter.index') }}">Dokter</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.pasien.index') }}">Pasien</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.jadwal.index') }}">Jadwal</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.reservasi.index') }}">Reservasi</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.kontak.index') }}">Pesan Kontak</a></li>
                            </ul>
                        </li>
                    @endif
                @endauth

                {{-- ======= LOGIN/LOGOUT & USER NAME ======= --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="color: #d63384;">Login</a>
                    </li>
                @else
                    {{-- Tampilkan nama user (pasien/admin) --}}
                    <li class="nav-item d-flex align-items-center me-2">
                        <span class="nav-link disabled" style="color: #d63384;">
                            👤 {{ Auth::user()->name }}
                        </span>
                    </li>

                    {{-- Tombol Logout --}}
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="nav-link btn btn-link" style="color: #d63384;" type="submit"
                                onclick="return confirm('Yakin ingin logout?')">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
