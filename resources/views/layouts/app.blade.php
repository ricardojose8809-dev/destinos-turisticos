<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Destinos Turísticos de El Salvador')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sv-blue: #0047AB;
            --sv-azul-claro: #4A90D9;
            --sv-sol: #FFC93C;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f6f8fb;
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: .5px;
        }
        .navbar-sv {
            background: linear-gradient(90deg, var(--sv-blue), #002d6b);
        }
        .footer-sv {
            background: #0d1b2a;
            color: #b8c2cc;
        }
        .card-lugar {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: transform .2s ease, box-shadow .2s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,.06);
        }
        .card-lugar:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0,0,0,.12);
        }
        .card-lugar img {
            height: 220px;
            object-fit: cover;
        }
        .badge-categoria {
            background-color: var(--sv-azul-claro);
        }
        .badge-precio {
            background-color: var(--sv-sol);
            color: #4a3900;
        }
        .hero-index {
            background: linear-gradient(135deg, var(--sv-blue), #00b4d8);
            color: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            margin-bottom: 2.5rem;
        }
        .carousel-detalle img {
            height: 420px;
            object-fit: cover;
            border-radius: 16px;
        }
        .btn-sv {
            background-color: var(--sv-blue);
            color: white;
        }
        .btn-sv:hover {
            background-color: #002d6b;
            color: white;
        }
    </style>
    @stack('estilos')
</head>
<body>
    <nav class="navbar navbar-dark navbar-sv mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fs-4" href="{{ route('lugares.index') }}">
                <i class="bi bi-geo-alt-fill"></i> Destinos Turísticos SV
            </a>
        </div>
    </nav>

    <div class="container pb-5">
        @if (session('exito'))
            <div class="alert alert-success shadow-sm">
                <i class="bi bi-check-circle-fill"></i> {{ session('exito') }}
            </div>
        @endif

        @yield('contenido')
    </div>

    <footer class="footer-sv py-4 mt-5">
        <div class="container text-center small">
            <p class="mb-1">🇸🇻 Catálogo de Destinos Turísticos de El Salvador</p>
            <p class="mb-0 text-muted">Proyecto académico — Laravel MVC</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>