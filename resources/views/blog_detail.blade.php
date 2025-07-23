<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
        }

        .breadcrumb {
            font-size: 14px;
            margin-bottom: 10px;
            color: #666;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .meta {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }

        img.featured {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 16px;
        }

        .tags {
            margin-top: 30px;
        }

        .tags span {
            display: inline-block;
            background: #e0e0e0;
            color: #333;
            padding: 5px 10px;
            margin: 3px;
            border-radius: 3px;
            font-size: 13px;
        }

        footer {
            margin-top: 40px;
            font-size: 14px;
            color: #aaa;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="breadcrumb">Home &raquo; Berita</div>

        <h1>{{ $blog->title }}</h1>
        <div class="meta">Dipublikasikan pada {{ $blog->created_at }} oleh <strong>Admin</strong></div>

        <img src="{{ url($blog->image) }}" alt="Gambar Berita" class="featured" />

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus erat at nulla luctus, nec vehicula
            felis malesuada. Aliquam erat volutpat. In ac felis eu justo pulvinar vulputate.</p>

        <p>Proin tempor tortor nec sapien luctus, nec feugiat libero iaculis. Ut sagittis diam at nisl tincidunt, in
            sodales turpis tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
            curae.</p>

        <p>Sed gravida magna nec nunc vestibulum, ut pretium tortor porttitor. Mauris non diam vel leo tincidunt varius.
            Integer at dictum velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
            turpis egestas.</p>

        <div class="tags">
            <span>#berita</span>
            <span>#teknologi</span>
            <span>#update</span>
        </div>

        <footer>
            &copy; 2025 Nama Website. Semua hak dilindungi.
        </footer>
    </div>
</body>

</html>
