@extends('layout')

@section('title', 'Tambah Pelanggan')

@section('judulh1', 'Tambah Pelanggan')

@section('konten')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Pelanggan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat:</label>
                    <textarea class="form-control" id="address" name="address" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
