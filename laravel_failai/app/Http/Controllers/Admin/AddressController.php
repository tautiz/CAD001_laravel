<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return view('address.index', ['addresses' => $addresses]);
    }

    public function store(AddressRequest $request)
    {
        $address = Address::create($request->all());
        return redirect()->route('addresses.show', $address);
    }

    public function create()
    {
        return view('address.create');
    }

    public function show(Address $address)
    {
        return view('address.show', ['address' => $address]);
    }

    public function edit(Address $address)
    {
        return view('address.edit', compact('address'));
    }

    public function update(AddressRequest $request, Address $address)
    {
        $address->update($request->all());
        return redirect()->route('addresses.show', $address);
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('addresses.index');
    }
}
