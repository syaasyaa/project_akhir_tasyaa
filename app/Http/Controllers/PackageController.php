<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        Package::create($request->all());
        return redirect()->route('packages.index');
    }

    public function show(Package $package)
    {
        return view('packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'description' => 'required',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $package->update($request->all());
        return redirect()->route('packages.index');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index');
    }
}
