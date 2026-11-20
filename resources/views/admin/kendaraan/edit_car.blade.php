@extends('admin.dashboard_admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <h1 class="m-0">Update Data Baru</h1>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kendaraan.update', $kendaraan->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Gambar</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $kendaraan->image) }}" placeholder="Masukkan Gambar Mobil">

                                    @error('image')
                                    <div class="invalid-feedback">x
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="font-weight￾bold">Warna</label>
                                    <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna', $kendaraan->warna) }}" placeholder="Masukkan Warna Mobil">
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
                                    <input type="text" class="form-control @error('merek') is-invalid @enderror" name="merek" value="{{ old('merek', $kendaraan->merek) }}" placeholder="Masukkan Merek Mobil">
                                    @error('merek')
                                    <div class="invalid-feedback">x
                                        {{ $message }}

                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Model</label>
                                    <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model', $kendaraan->model) }}" placeholder="Masukkan Model Mobil">
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
                                    <select name="jenis_sewa" id="jenis_sewa" class="form-control @error('jenis_sewa') is-invalid @enderror">
                                        <option value="">Pilih Jenis Sewa</option>
                                        <option value="Hari" {{ ($kendaraan->jenis_sewa == 'Hari') ? 'selected' : '' }}>Harian</option>
                                        <option value="Minggu" {{ ($kendaraan->jenis_sewa == 'Minggu') ? 'selected' : '' }}>Mingguan</option>
                                        <option value="Bulan" {{ ($kendaraan->jenis_sewa == 'Bulan') ? 'selected' : '' }}>Bulanan</option>
                                    </select>

                                    @error('image')
                                    <div class="invalid-feedback">x
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Harga Sewa</label>
                                    <input type="number" class="form-control @error('harga_sewa') is-invalid @enderror" name="harga_sewa" value="{{ old('harga_sewa', $kendaraan->harga_sewa) }}" placeholder="Masukkan Harga Sewa Mobil">
                                    @error('harga_sewa')
                                    <div class="invalid-feedback">x
                                        {{ $message }}

                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <a href="{{ route('kendaraan.index') }}" type="button" class="btn btn-danger mx-2">Close</a>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection