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

        .pagination {
            display: flex;
            justify-content: center;
            padding: 1rem 0;
            list-style: none;
            border-radius: 0.5rem;
            gap: 0.5rem;
        }

        .page-item {
            transition: transform 0.2s ease-in-out;
        }

        .page-item:hover {
            transform: scale(1.05);
        }

        .page-link {
            color: #4a5568;
            /* abu-abu gelap */
            border: 1px solid #e2e8f0;
            /* abu-abu terang */
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            background-color: #fff;
            text-decoration: none;
            font-weight: 500;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .page-item.disabled .page-link {
            color: #a0aec0;
            pointer-events: none;
            background-color: #edf2f7;
            border-color: #e2e8f0;
        }

        .page-item.active .page-link {
            color: #fff;
            background-color: #3182ce;
            /* biru */
            border-color: #3182ce;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Artikel Terbaru</h2>
        <p class="lead">Artikel terbaru tentang teknologi dan kehidupan digital</p>
        <form action="{{ route('beranda') }}" method="GET" style="margin-bottom: 30px; text-align: center;">
            <input type="text" name="search" placeholder="Cari artikel..." value="{{ request('search') }}"
                style="padding: 10px; width: 60%; max-width: 400px; border: 1px solid #ccc; border-radius: 5px;">
            <button type="submit"
                style="padding: 10px 20px; background-color: #0d6efd; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Cari
            </button>
        </form>
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
        {{-- paginate --}}
        {{ $blogs->links() }}
    </div>

</body>

</html>
