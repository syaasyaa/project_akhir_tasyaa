<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::all(); 
        return view('customers.index', [
            "title" => "Customer",
            "customers" => $customers
        ]);
    }

    public function create(): View
    {
        return view('customers.create')->with([
            "title" => "Tambah Data Customer",
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "email" => "nullable|email",
            "phone" => "nullable",
        ]);
        
        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Data Customer Berhasil Ditambahkan');
    }

    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'))->with([
            "title" => "Ubah Data Customer",
        ]);
    }
    
    public function update(Customer $customer, Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "email" => "nullable|email",
            "phone" => "nullable",
        ]);

        $customer->update($request->all());
        return redirect()->route('customers.index')->with('updated', 'Data Customer Berhasil Diubah');
    }

    public function destroy($id): RedirectResponse
    {
        Customer::where('id', $id)->delete();
        return redirect()->route('customers.index')->with('deleted', 'Data Customer Berhasil Dihapus');
    }

    
}
