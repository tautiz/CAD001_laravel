<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return view('address.index');
    }

    public function create()
    {
        return view('address.create');
    }

    public function store(Request $request)
    {
        $address = Address::create($request->all());
        return redirect()->route('address.show', $address);
    }

    public function show(Address $address)
    {
        return view('address.show', ['address' => $address]);;
    }

    public function edit(Address $address)
    {
        return view('address.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
        return redirect()->route('address.show', $address);
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('address.index');
    }
}
