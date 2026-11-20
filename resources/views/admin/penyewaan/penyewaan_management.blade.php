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
        <h1>Penyewaan Management</h1>
    </div>

    <div class="container-fluid" sstyle="overflow-y: auto; max-height: 450px;">
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
        <div>
            @forelse ($penyewaan as $item)
            <div class="card mb-3 {{ $item->status == 'Ongoing' ? 'bg-danger' : 'bg-success' }}" style="max-width: 100%;">
                <div class="row g-0 p-2">
                    <div class="col-md-3 px-2 py-1">
                        <img src="{{ asset($item->kendaraan->image) }}" class="rounded border border-black" alt="..." style="height: 100%; width: 100%;">
                    </div>
                    <div class="col-md-6 mx-3">
                        <div class="card-body">
                            <h5 class="">{{ $item->user->username }}</h5>
                            <p class="card-text"><strong>Total Biaya Sewa : </strong>IDR {{ number_format($item['total_harga_penyewaan']) }} <br> <strong>Lama Sewa : </strong>{{ $item['lama_sewa'] }} {{ $item->kendaraan->jenis_sewa }}<br> <strong>Status Sewa : </strong>{{ $item['status'] }}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 py-4 d-flex justify-content-end align-items-center">
                        @if ($item->status == 'Ongoing')
                        <form action="{{ route('penyewaan.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="edit-icon btn btn-lg btn-primary" type="submit">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>

                        @else
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penyewaan.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-icon btn btn-lg btn-danger" type="submit">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-danger">
            Data Penyewaan tidak ditemukan!
        </div>
        @endforelse
    </div>

</div>
@endsection