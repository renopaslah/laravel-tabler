@extends('layouts.app.app')

@section('subtitle')
    @include('admin.user_role.subtitle_create')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('admin.user.role.store', ['user' => request('user')]) }}" method="post">
                @csrf
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tentukan Peran</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Peran</label>
                                @foreach ($roles as $item)
                                    <button type="button" data-id="{{ $item['id'] }}"
                                        class="btn {{ $item['btn'] }} mb-1 bRole">{{ $item['name'] }}</button>
                                @endforeach
                                <input id="iRole" type="text" class="form-control d-none" name="role" value="0">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-warning">Batal</a>
                            <button disabled id="bSave" type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#bSave').removeAttr('disabled');
            setRoleValue();
            function setRoleValue() {
                const buttons = document.getElementsByClassName('bRole');
                const iRole = document.getElementById('iRole');
                const selectedIds = [];

                for (let i = 0; i < buttons.length; i++) {
                    if (buttons[i].classList.contains('btn-primary')) {
                        const dataId = buttons[i].getAttribute('data-id');
                        selectedIds.push(dataId);
                    }
                }

                if (selectedIds.length > 0) {
                    iRole.value = selectedIds.join(',');
                } else {
                    iRole.value = '0';
                }
            }

            $('.bRole').click(function() {
                // set selected
                var hasPrimaryClass = $(this).hasClass('btn-primary');

                if (!hasPrimaryClass) {
                    $(this).addClass('btn-primary');
                    $(this).removeClass('btn-outline-primary');
                } else {
                    $(this).addClass('btn-outline-primary');
                    $(this).removeClass('btn-primary');
                }

                // set role id
                // $('#iRole').val($(this).data('id'));
                setRoleValue();
            });
        });
    </script>
@endpush
