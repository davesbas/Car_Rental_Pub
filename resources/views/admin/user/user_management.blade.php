@extends('admin.dashboard_admin')
@section('content')

<style>
    .content {
        margin-left: 100px;
        margin-right: 100px;
    }
</style>

<!-- Main Content -->
<div class="content">
    <div class="title d-flex justify-content-between" style="padding-top: 15px; padding-bottom: 30px;">
        <h1>User Management</h1>
    </div>

    <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
        @endif
        @forelse ($user as $item)
        <div class="card mb-3" style="max-width: 100%;">
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $item->id_user) }}" method="POST">
                <div class="row g-0 p-2">
                    <div class="col-md-1 px-2 py-3">
                        <img src="{{ asset($item['image_profil']) }}" class="img-circle rounded-circle border border-black" alt="..." style="height: 75px; width: 75px;">
                    </div>
                    <div class="col-md-8 mx-3">
                        <div class="card-body">
                            <h5 class="">{{ $item['username'] }} ({{ $item['role'] }})</h5>
                            <p class="card-text"><strong>NIK : </strong>{{ $item['nik'] }} - <strong>Born Date : </strong>{{ $item['born_date'] }} <br> <strong>Email : </strong>{{ $item['email'] }} - <strong>Num Phone : </strong>{{ $item['num_phone'] }}</p>
                        </div>
                    </div>

                    @if($item->role == 'user')
                    <div class="col-md-1 py-4 d-flex justify-content-end align-items-center">
                        @csrf
                        @method('DELETE')
                        <button class="delete-icon btn btn-lg btn-danger" type="submit">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    @empty
    <div class="alert alert-danger">
        Data User tidak ditemukan!
    </div>
    @endforelse
</div>

<!-- Modal Dialog - Delete -->
<div class="modal fade" id="staticDeleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Delete User?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                <a href="{{ url('') }}" role="button" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Dialog - Delete -->
</div>
@endsection