@extends('layouts.app.app')

@section('subtitle')
    @include('permission.user.subtitle')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="table-responsive d-none">
                <div class="card-body">
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
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary mb-1">Ubah</a>
                                        <a href="#" class="btn btn-sm btn-info mb-1">Reset Password</a>
                                        <a href="{{ route('user.role.create', ['user' => $item->id]) }}"
                                            class="btn btn-sm btn-success mb-1">Peran</a>
                                        <a href="#" class="btn btn-sm btn-warning mb-1">Tangguhkan</a>
                                        <button type="button" class="btn btn-sm btn-danger delete-btn mb-1"
                                            data-id="{{ $item->id }}">Hapus</button>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ Str::mask($item->email, '*', -16, 6) }}</td>
                                    <td>
                                        @foreach ($item->roles as $role)
                                            <span class="badge badge-outline text-blue">{{ $role->name }}</span>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.table-responsive').removeClass('d-none');
        });
    </script>
@endpush
