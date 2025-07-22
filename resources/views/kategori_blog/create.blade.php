@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 font-weight-bold">Halaman Tambah Kategori Blog</h3>
            <p>Halaman untuk mengelola kategori blog.</p>
        </div>
        <div class="col-sm-6">
            <div class="d-flex align-items-center justify-content-md-end">
                <div class="pr-1 mb-3 mb-xl-0">
                    <a href="{{ route('kategori_blog.index') }}" class="btn btn-sm text-white bg-info btn-icon-text border">
                        <i class="typcn typcn-arrow-left-outline mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card mt-3">
            <div class="card">
                {{-- Read Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('kategori_blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="isi">Keterangan</label>
                            <textarea class="form-control" id="isi" name="keterangan" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button class="btn btn-light">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
