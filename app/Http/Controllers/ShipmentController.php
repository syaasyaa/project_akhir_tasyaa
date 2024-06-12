<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Customer;
use App\Models\Package;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ShipmentController extends Controller
{
    public function index(): View
    {
        $shipments = Shipment::with('customer', 'package')->get(); 
        return view('shipments.index', [
            "title" => "Pengiriman",
            "shipments" => $shipments
        ]);
    }

    public function create(): View
    {
        return view('shipments.create')->with([
            "title" => "Tambah Data Pengiriman",
            "customers" => Customer::all(),
            "packages" => Package::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "customer_id" => "required|exists:customers,id",
            "package_id" => "required|exists:packages,id",
            "shipment_date" => "required|date",
            "status" => "required"
        ]);
        
        Shipment::create($request->all());
        return redirect()->route('shipments.index')->with('success', 'Data Pengiriman Berhasil Ditambahkan');
    }

    public function edit(Shipment $shipment): View
    {
        return view('shipments.edit', compact('shipment'))->with([
            "title" => "Ubah Data Pengiriman",
            "customers" => Customer::all(),
            "packages" => Package::all()
        ]);
    }
    
    public function update(Shipment $shipment, Request $request): RedirectResponse
    {
        $request->validate([
            "status" => "required"
        ]);

        $shipment->update($request->all());
        return redirect()->route('shipments.index')->with('updated', 'Data Pengiriman Berhasil Diubah');
    }

    public function destroy($id): RedirectResponse
    {
        Shipment::where('id', $id)->delete();
        return redirect()->route('shipments.index')->with('deleted', 'Data Pengiriman Berhasil Dihapus');
    }
}
