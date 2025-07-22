@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 font-weight-bold">Halaman Blog</h3>
            <p>Halaman untuk mengelola blog.</p>
        </div>
        <div class="col-sm-6">
            <div class="d-flex align-items-center justify-content-md-end">
                <div class="mb-3 mb-xl-0 pr-1">
                    <div class="dropdown">
                        <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button"
                            id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="typcn typcn-calendar-outline mr-2"></i>Last 7 days
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                            <h6 class="dropdown-header">Last 14 days</h6>
                            <a class="dropdown-item" href="#">Last 21 days</a>
                            <a class="dropdown-item" href="#">Last 28 days</a>
                        </div>
                    </div>
                </div>
                <div class="pr-1 mb-3 mr-2 mb-xl-0">
                    <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i
                            class="typcn typcn-arrow-forward-outline mr-2"></i>Export</button>
                </div>
                <div class="pr-1 mb-3 mb-xl-0">
                    <a href="{{ route('blog.create') }}" class="btn btn-sm text-white bg-success btn-icon-text border">
                        <i class="typcn typcn-document-add mr-2"></i>
                        Tambah
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin mt-3 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Gambar
                                    </th>
                                    <th>
                                        Judul
                                    </th>
                                    <th>
                                        Kategori
                                    </th>
                                    <th>
                                        Dibuat Oleh
                                    </th>
                                    <th>
                                        Dibuat Pada
                                    </th>
                                    <th>
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blogs as $blog)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{ url($blog->image) }}" alt="image">
                                        </td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->kategori }}</td>
                                        <td>{{ $blog->author }}</td>
                                        <td>{{ $blog->created_at }}</td>
                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id) }}"
                                                class="btn btn-sm bg-info text-white">
                                                <i class="typcn typcn-edit"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm bg-danger text-white">
                                                    <i class="typcn typcn-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Data Kosong
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
