<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function index()
    {
        return view('payment_type.index');
    }

    public function create()
    {
        return view('payment_type.create');
    }

    public function store(Request $request)
    {
        $payment_type = PaymentType::create($request->all());
        return redirect()->route('payment_type.show', $payment_type);
    }

    public function show(PaymentType $payment_type)
    {
        return $payment_type;
    }

    public function edit(PaymentType $payment_type)
    {
        return view('payment_type.edit', compact('payment_type'));
    }

    public function update(Request $request, PaymentType $payment_type)
    {
        $payment_type->update($request->all());
        return redirect()->route('payment_type.show', $payment_type);
    }

    public function destroy(PaymentType $payment_type)
    {
        $payment_type->delete();
        return redirect()->route('payment_type.index');
    }
}
