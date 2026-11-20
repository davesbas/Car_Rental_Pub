@extends('admin.dashboard_admin')
@section('content')

<style>
    .content {
        margin-left: 100px;
        margin-right: 100px;
    }

    .card {
        position: relative;
    }

    .delete-icon {
        position: absolute;
        background-color: red;
        height: 30px;
        width: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        top: 5px;
        right: 10px;
        opacity: 80%;
    }

    .edit-icon {
        position: absolute;
        background-color: lightskyblue;
        height: 30px;
        width: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        top: 5px;
        right: 50px;
        opacity: 80%;
    }
</style>

<div class="content">
    <div class="title d-flex justify-content-between" style="padding-top: 15px; padding-bottom: 30px;">
        <h1>Car Management</h1>
        <button class="btn btn-sm btn-success mx-3 px-3" type="button" data-bs-toggle="modal" data-bs-target="#staticAddCar">
            <i class="fa-solid fa-plus"></i> Add Car
        </button>
    </div>

    <div class="container-fluid" style="overflow-y: auto; max-height: 450px;">
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
        <div class="d-flex flex-wrap justify-content-between">
            @forelse ($kendaraan as $item)
            <div class="card" style="width: 48%;">
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kendaraan.destroy', $item->id) }}" method="POST">
                    <a href="{{ route('kendaraan.edit', $item->id) }}" class="edit-icon btn btn-sm btn-primary"><i class="fa-solid fa-pen"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="delete-icon btn btn-sm btn-danger" type="submit">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
                <img src="{{ asset($item['image']) }}" class="card-img-top" alt="..." style="height: 220px;">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $item['model'] }}</strong></h5>
                    <p class="card-text">{{ $item['merek'] }} - {{ $item['warna'] }} <br> IDR {{ number_format($item['harga_sewa']) }} / {{ $item['jenis_sewa'] }}</p>
                </div>
            </div>
            @empty
            <div class="alert alert-danger">
                Data Mobil tidak ditemukan!
            </div>
            @endforelse
        </div>
    </div>

    <!-- Modal Dialog - Add Car -->
    <div class="modal fade" id="staticAddCar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticAddCarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Mobil Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="addCarForm" action="{{ route('kendaraan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Gambar</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" placeholder="Masukkan Gambar Mobil">

                                @error('image')
                                <div class="invalid-feedback">x
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight￾bold">Warna</label>
                                <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna') }}" placeholder="Masukkan Warna Mobil">
                                @error('warna')
                                <div class="invalid-feedback">x
                                    {{ $message }}

                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="font-weight￾bold">Merek</label>
                                <input type="text" class="form-control @error('merek') is-invalid @enderror" name="merek" value="{{ old('merek') }}" placeholder="Masukkan Merek Mobil">
                                @error('merek')
                                <div class="invalid-feedback">x
                                    {{ $message }}

                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Model</label>
                                <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" placeholder="Masukkan Model Mobil">
                                @error('model')
                                <div class="invalid-feedback">x
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Jenis Sewa</label>
                                <select name="jenis_sewa" id="jenis_sewa" class="form-control @error('image') is-invalid @enderror">
                                    <option value="">Pilih Jenis Sewa</option>
                                    <option value="Hari">Harian</option>
                                    <option value="Minggu">Mingguan</option>
                                    <option value="Bulan">Bulanan</option>
                                </select>

                                @error('image')
                                <div class="invalid-feedback">x
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Harga Sewa</label>
                                <input type="number" class="form-control @error('harga_sewa') is-invalid @enderror" name="harga_sewa" value="{{ old('harga_sewa') }}" placeholder="Masukkan Harga Sewa Mobil">
                                @error('harga_sewa')
                                <div class="invalid-feedback">x
                                    {{ $message }}

                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal Dialog - Add car -->
</div>
@endsection