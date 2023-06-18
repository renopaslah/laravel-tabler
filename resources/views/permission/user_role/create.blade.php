@extends('layouts.app.app')

@section('subtitle')
    @include('permission.user_role.subtitle_create')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('role.store') }}" method="post">
                @csrf
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Peran</label>
                                @foreach ($roles as $item)
                                    <button class="btn btn-outline-primary mb-1">{{ $item->name }}</button>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('role.index') }}" type="button" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
