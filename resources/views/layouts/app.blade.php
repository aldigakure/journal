<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jurnal Guru')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="d-md-none bg-white shadow-sm border-bottom">
        <div class="container-fluid d-flex align-items-center justify-content-between p-2">
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSidebar" aria-expanded="false" aria-controls="mobileSidebar">
                    <i class="bi bi-list"></i>
                </button>
                <span class="fw-bold">Jurnal Guru Stemka</span>
            </div>
            <div>
                <button class="btn btn-sm btn-outline-secondary" onclick="location.reload();" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="collapse" id="mobileSidebar">
        <div class="mobile-sidebar-backdrop"></div>
        <div class="mobile-sidebar">
            <div class="p-3 d-flex justify-content-between align-items-center border-bottom">
                <strong class="m-0">Jurnal Guru Stemka</strong>
                <button class="btn btn-sm btn-outline-light" data-bs-toggle="collapse" data-bs-target="#mobileSidebar">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <nav class="p-3">
                <a href="{{ route('journals.index') }}" class="d-block mb-2">
                    <i class="bi bi-book"></i> Jurnal Mengajar
                </a>
                <a href="{{ route('teachers.index') }}" class="d-block mb-2">
                    <i class="bi bi-person-badge"></i> Data Guru
                </a>
                <a href="{{ route('subjects.index') }}" class="d-block mb-2">
                    <i class="bi bi-book-half"></i> Mata Pelajaran
                </a>
                <a href="{{ route('classes.index') }}" class="d-block mb-2">
                    <i class="bi bi-door-open"></i> Data Kelas
                </a>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (desktop only) -->
            <div class="d-none d-md-block col-md-2 sidebar p-0">
                <div class="p-4">
                    <h4 class="text-white mb-4"><i class="bi bi-journal-text"></i> Jurnal Guru Stemka</h4>
                    <nav class="d-block">
                        <a href="{{ route('journals.index') }}" class="{{ request()->routeIs('journals.*') ? 'active' : '' }}">
                            <i class="bi bi-book"></i> Jurnal Mengajar
                        </a>
                        <a href="{{ route('teachers.index') }}" class="{{ request()->routeIs('teachers.*') ? 'active' : '' }}">
                            <i class="bi bi-person-badge"></i> Data Guru
                        </a>
                        <a href="{{ route('subjects.index') }}" class="{{ request()->routeIs('subjects.*') ? 'active' : '' }}">
                            <i class="bi bi-book-half"></i> Mata Pelajaran
                        </a>
                        <a href="{{ route('classes.index') }}" class="{{ request()->routeIs('classes.*') ? 'active' : '' }}">
                            <i class="bi bi-door-open"></i> Data Kelas
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-12 col-md-10 p-4">
                <!-- main alerts -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>