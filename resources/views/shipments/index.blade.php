@extends('layout')

@section('title', 'Shipments')

@section('judulh1', 'Daftar Pengiriman')

@section('konten')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pengiriman</h3>
            <div class="card-tools">
                <a href="{{ route('shipments.create') }}" class="btn btn-success">Tambah Pengiriman</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Paket</th>
                        <th>Tanggal Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shipments as $shipment)
                    <tr>
                        <td>{{ $shipment->id }}</td>
                        <td>{{ $shipment->customer->name }}</td>
                        <td>{{ $shipment->package->description }}</td>
                        <td>{{ $shipment->shipment_date }}</td>
                        <td>
                            <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('shipments.destroy', $shipment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
