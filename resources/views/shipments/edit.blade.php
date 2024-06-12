@extends('layout')

@section('title', 'Edit Pengiriman')

@section('judulh1', 'Edit Pengiriman')

@section('konten')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Edit Pengiriman</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="dikirim">dikirim</option>
                        <option value="diterima">diterima</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('shipments.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
