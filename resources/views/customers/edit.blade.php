@extends('layout')

@section('title', 'Edit Pelanggan')

@section('judulh1', 'Edit Pelanggan')

@section('konten')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Edit Pelanggan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat:</label>
                    <textarea class="form-control" id="address" name="address" required>{{ $customer->address }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
