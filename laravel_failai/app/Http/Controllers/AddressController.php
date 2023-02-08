<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return view('address.index', ['addresses' => $addresses]);
    }

    public function create()
    {
        return view('address.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'type' => ['required', 'string',],
            'country' => ['required', 'string'],
            'state' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'zip' => ['required', 'string'],
            'street' => ['required', 'string'],
            'house_number' => ['required', 'string'],
            'apartment_number' => ['nullable', 'string'],
            'additional_info' => ['nullable', 'string', 'min:3'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $address = Address::create($request->all());
        return redirect()->route('addresses.show', $address);
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
        return redirect()->route('addresses.show', $address);
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('addresses.index');
    }
}
