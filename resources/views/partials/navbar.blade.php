
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            KursusKu
        </a>

        <!-- TOGGLER MOBILE -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarKursusKu"
                aria-controls="navbarKursusKu"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU NAVBAR -->
        <div class="collapse navbar-collapse" id="navbarKursusKu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <!-- BERANDA -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                <!-- DAFTAR KURSUS -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        Daftar Kursus
                    </a>
                </li>

                <!-- HASIL PERTEMUAN 10 -->
                <li class="nav-item ms-lg-3 my-2 my-lg-0">
                    <a class="btn btn-light btn-sm text-primary fw-bold px-3"
                       href="{{ route('courses.index') }}">
                        Hasil Pertemuan 10
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
