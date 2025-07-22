@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 font-weight-bold">Halaman Tambah Blog</h3>
            <p>Halaman untuk mengelola blog.</p>
        </div>
        <div class="col-sm-6">
            <div class="d-flex align-items-center justify-content-md-end">
                <div class="pr-1 mb-3 mb-xl-0">
                    <a href="{{ route('blog') }}" class="btn btn-sm text-white bg-info btn-icon-text border">
                        <i class="typcn typcn-arrow-left-outline mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    {{-- Blog edit --}}
                    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ $blog->title }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $blog->kategori_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="4">{{ $blog->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
