<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PackageController extends Controller
{
    public function index(): View
    {
        $packages = Package::all(); 
        return view('packages.index', [
            "title" => "Paket",
            "packages" => $packages
        ]);
    }

    public function create(): View
    {
        return view('packages.create')->with([
            "title" => "Tambah Data Paket",
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "weight" => "required|numeric",
        ]);
        
        Package::create($request->all());
        return redirect()->route('packages.index')->with('success', 'Data Paket Berhasil Ditambahkan');
    }

    public function edit(Package $package): View
    {
        return view('packages.edit', compact('package'))->with([
            "title" => "Ubah Data Paket",
        ]);
    }
    
    public function update(Package $package, Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "weight" => "required|numeric",
        ]);

        $package->update($request->all());
        return redirect()->route('packages.index')->with('updated', 'Data Paket Berhasil Diubah');
    }

    public function destroy($id): RedirectResponse
    {
        Package::where('id', $id)->delete();
        return redirect()->route('packages.index')->with('deleted', 'Data Paket Berhasil Dihapus');
    }
}
