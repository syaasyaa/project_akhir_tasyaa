<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Customer;
use App\Models\Package;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::with(['customer', 'package'])->get();
        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        $customers = Customer::all();
        $packages = Package::all();
        return view('shipments.create', compact('customers', 'packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'package_id' => 'required|exists:packages,id',
            'status' => 'required',
            'shipment_date' => 'required|date',
        ]);

        Shipment::create($request->all());
        return redirect()->route('shipments.index');
    }

    public function show(Shipment $shipment)
    {
        return view('shipments.show', compact('shipment'));
    }

    public function edit(Shipment $shipment)
    {
        $customers = Customer::all();
        $packages = Package::all();
        return view('shipments.edit', compact('shipment', 'customers', 'packages'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'package_id' => 'required|exists:packages,id',
            'status' => 'required',
            'shipment_date' => 'required|date',
        ]);

        $shipment->update($request->all());
        return redirect()->route('shipments.index');
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect()->route('shipments.index');
    }
}
