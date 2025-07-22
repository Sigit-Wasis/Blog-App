@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 font-weight-bold">Halaman User</h3>
            <p>Halaman untuk mengelola user.</p>
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
                    <a href="{{ route('user.create') }}" class="btn btn-sm text-white bg-success btn-icon-text border">
                        <i class="typcn typcn-document-add"></i>
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
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Dibuat Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="py-1">
                                            <img src="{{ url('assets/images/foto/' . $user->foto) }}" alt="image">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->jenis_kelamin }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-sm bg-info text-white">
                                                <i class="typcn typcn-edit"></i> Edit
                                            </a>

                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                style="display:inline-block;"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm bg-danger text-white">
                                                    <i class="typcn typcn-trash"></i> Hapus
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
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
