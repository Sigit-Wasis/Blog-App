<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog Keren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .hero {
            background: linear-gradient(to right, #0d6efd, #6610f2);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .card-img-top {
            height: 300px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">MyBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="display-4 fw-bold">Selamat Datang di MyBlog</h1>
            <p class="lead">Berbagi cerita, tips coding, dan inspirasi setiap minggu.</p>
            <a href="#articles" class="btn btn-light btn-lg mt-3">Lihat Artikel</a>
        </div>
    </section>

    <!-- Artikel Terbaru -->
    <section id="articles" class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Artikel Terbaru</h2>
            <div class="row g-4">
                @forelse ($blogs as $blog)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ url($blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}</p>
                                <a href="{{ route('beranda.show', $blog->slug) }}" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada artikel tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">© 2025 MyBlog. Dibuat dengan ❤️ dan Bootstrap 5.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
