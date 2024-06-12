@extends('layout')

@section('judulh1', 'Tambah Data Paket')

@section('konten')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Paket</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('packages.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nama barang</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi Paket</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" required>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="weight">Berat Paket</label>
                    <input type="number" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" step="0.01" required>
                    @error('weight')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('packages.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
