@extends('layouts.app.app')

@section('subtitle')
    @include('permission.role.subtitle')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="table-responsive">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive d-none">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th width="120px">#</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('role.edit', ['role' => $item->id]) }}"
                                                class="btn btn-sm btn-primary">Ubah</a>
                                            <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                data-id="{{ $item->id }}">Hapus</button>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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

            // delete
            $('.delete-btn').click(function() {
                var itemId = $(this).data('id');

                if (confirm('Apakah Anda yakin ingin menghapus?')) {
                    $.ajax({
                        url: 'role/' + itemId,
                        type: 'DELETE',
                        data: {
                            "_token": $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            window.location.href = 'role';
                        },
                        error: function(xhr) {
                            console.log('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
