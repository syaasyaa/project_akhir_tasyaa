@extends('layout')

@section('title', 'Tambah Pengiriman')

@section('judulh1', 'Tambah Pengiriman')

@section('konten')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Pengiriman</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('shipments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="customer_id">Pelanggan:</label>
                    <select class="form-control" id="customer_id" name="customer_id" required>
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="package_id">Paket:</label>
                    <select class="form-control" id="package_id" name="package_id" required>
                        @foreach ($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="shipment_date">Tanggal Pengiriman:</label>
                    <input type="date" class="form-control" id="shipment_date" name="shipment_date" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('shipments.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
