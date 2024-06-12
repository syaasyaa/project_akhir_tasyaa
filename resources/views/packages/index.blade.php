@extends('layout')

@section('title', 'Packages')

@section('judulh1', 'Daftar Paket')

@section('konten')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Paket</h3>
            <div class="card-tools">
                <a href="{{ route('packages.create') }}" class="btn btn-success">Tambah Paket</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nama barang</th>
                        <th>Deskripsi</th>
                        <th>Berat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                    <tr>
                        <td>{{ $package->id }}</td>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->description }}</td>
                        <td>{{ $package->weight }} kg</td>
                        <td>
                            <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline;">
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
