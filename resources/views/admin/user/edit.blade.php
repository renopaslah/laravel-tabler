@extends('layouts.app.app')

@section('subtitle')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Hak Akses
                    </div>
                    <h2 class="page-title">
                        Pengguna
                    </h2>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
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
            <form action="{{ route('admin.user.update', ['user' => request('user')]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="name" type="text" class="form-control"
                                            value="{{ old('name') ? old('name') : $user->name }}" autocomplete="off">
                                        <label for="floating-input">Nama</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="email" type="email" class="form-control"
                                            value="{{ old('email') ? old('email') : $user->email }}" autocomplete="off">
                                        <label for="floating-input">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="password" type="password" class="form-control" value=""
                                            autocomplete="off">
                                        <label for="floating-input">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="password_confirmation" type="password" class="form-control"
                                            value="" autocomplete="off">
                                        <label for="floating-input">Password Confirmation</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (Route::currentRouteName() === 'admin.user.edit')
        <form action="{{ route('admin.user.update', ['user' => request('user')]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="modal card-blur fade" id="card-edit" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="card-dialog card-lg card-dialog-centered" role="document">
                    <div class="card-content">
                        <div class="card-header">
                            <h5 class="card-title">Edit Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input name="name" type="text" class="form-control"
                                            value="@if ($user) {{ $user->name }} @endif"
                                            autocomplete="off">
                                        <label for="floating-input">Nama</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#sRole').select2({
                placeholder: 'Pilih Role',
                width: '100%',
            });
        });
    </script>
@endpush
