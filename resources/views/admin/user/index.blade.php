@extends('layouts.app.app')

@section('subtitle')
    @include('admin.user.subtitle')
@endsection

@section('content')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row row-deck row-cards">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive d-none">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary mb-1">Ubah</a>
                                                <a href="#" class="btn btn-sm btn-info mb-1">Reset Password</a>
                                                <a href="{{ route('admin.user.role.create', ['user' => $item->id]) }}"
                                                    class="btn btn-sm btn-success mb-1">Peran</a>
                                                <a href="#" class="btn btn-sm btn-warning mb-1">Tangguhkan</a>
                                                        <form
                                                            action="{{ route('admin.user.destroy', ['user' => $item->id]) }}"
                                                            method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            @csrf
                                                            @method('DELETE')
        
                                                            <button type="submit" class="btn btn-sm btn-danger delete-btn mb-1">Hapus</button>
                                                        </form>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ Str::mask($item->email, '*', -16, 6) }}</td>
                                            <td>
                                                @foreach ($item->roles as $role)
                                                    <span
                                                        class="badge badge-outline text-blue mb-1">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>-</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="name" type="text" class="form-control" id="floating-input"
                                        value="{{ old('name') }}" autocomplete="off">
                                    <label for="floating-input">Nama</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="email" type="email" class="form-control" id="floating-input"
                                        value="{{ old('email') }}" autocomplete="off">
                                    <label for="floating-input">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="password" type="password" class="form-control" id="floating-input"
                                        value="" autocomplete="off">
                                    <label for="floating-input">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="password_confirmation" type="password" class="form-control"
                                        id="floating-input" value="" autocomplete="off">
                                    <label for="floating-input">Password Confirmation</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="mb-1">Role</label>
                                    <select class="form-select" name="role" id="sRole">
                                        <option value=""></option>
                                        @foreach ($roles as $item)
                                            @if ($item->name == old('role'))
                                                <option selected value="{{ $item->name }}">{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.table-responsive').removeClass('d-none');

            $('#sRole').select2({
                placeholder: 'Pilih Role',
                dropdownParent: $("#modal-report"),
                width: '100%',
            });
        });
    </script>
@endpush
