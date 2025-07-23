<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0 0 10px;
            color: #222;
        }

        .card-text {
            flex-grow: 1;
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .card a {
            text-decoration: none;
            background-color: #0d6efd;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
        }

        .card a:hover {
            background-color: #0b5ed7;
        }

        .lead {
            text-align: center;
            margin-top: -20px;
            margin-bottom: 30px;
            color: #777;
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Artikel Terbaru</h2>
        <p class="lead">Artikel terbaru tentang teknologi dan kehidupan digital</p>
        <div class="grid">
            @forelse ($blogs as $blog)
                <div class="card">
                    <img src="{{ url($blog->image) }}" alt="Judul Artikel">
                    <div class="card-body">
                        <h3 class="card-title">{{ $blog->title }}</h3>
                        <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                        <a href="{{ route('beranda.show', $blog->slug) }}">Baca Selengkapnya</a>
                    </div>
                </div>
            @empty
                <p>Tidak ada artikel yang tersedia.</p>
            @endforelse
        </div>
    </div>

</body>

</html>
