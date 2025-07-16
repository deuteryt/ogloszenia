<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Serwis Ogłoszeniowy' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .category-sidebar {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
        }
        .category-link {
            display: block;
            padding: 8px 12px;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .category-link:hover {
            background: #e9ecef;
            color: #007bff;
        }
        .ad-card {
            transition: transform 0.2s;
        }
        .ad-card:hover {
            transform: translateY(-2px);
        }
        .banner-sidebar {
            margin-bottom: 20px;
        }
        .banner-sidebar img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <h1 class="h3 mb-0">
                        <a href="{{ route('home') }}" class="text-white text-decoration-none">
                            <i class="fas fa-bullhorn"></i> OgłoszeniaPlus
                        </a>
                    </h1>
                </div>
                <div class="col-md-6">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Szukaj ogłoszeń..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-3 text-end">
                    <a href="#" class="btn btn-warning">
                        <i class="fas fa-plus"></i> Dodaj ogłoszenie
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Wszystkie ogłoszenia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Promowane</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontakt</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>OgłoszeniaPlus</h5>
                    <p>Najlepszy serwis ogłoszeniowy w Polsce.</p>
                </div>
                <div class="col-md-4">
                    <h5>Linki</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50">Regulamin</a></li>
                        <li><a href="#" class="text-white-50">Polityka prywatności</a></li>
                        <li><a href="#" class="text-white-50">Pomoc</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontakt</h5>
                    <p class="text-white-50">
                        <i class="fas fa-envelope"></i> kontakt@ogloszenia.pl<br>
                        <i class="fas fa-phone"></i> +48 123 456 789
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 OgłoszeniaPlus. Wszystkie prawa zastrzeżone.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>