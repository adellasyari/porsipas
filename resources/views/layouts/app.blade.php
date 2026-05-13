<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PorsiPas - Meal-Kit Anak Kos</title>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar" id="navbar">
        <div class="container nav-container">
            <!-- Logo -->
            <a href="/" class="brand-logo">
                <span class="text-orange">Porsi</span>Pas
            </a>
            
            <!-- Menu Navigasi -->
            <nav class="nav-menu" id="nav-menu">
                <ul class="nav-list">
                    <li><a href="{{ url('/') }}" class="nav-link">Beranda</a></li>
                    <li><a href="{{ url('/katalog') }}" class="nav-link">Katalog Menu</a></li>
                    <li><a href="{{ url('/arsip') }}" class="nav-link">Tips & Resep</a></li>
                </ul>
                <div class="nav-actions">
                    <a href="/login" class="btn btn-outline">Masuk</a>
                </div>
            </nav>

            <!-- Hamburger Button (Mobile) -->
            <button class="hamburger" id="hamburger" aria-label="Toggle Menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 PorsiPas - Solusi Makan Anak Kos.</p>
        </div>
    </footer>

    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
