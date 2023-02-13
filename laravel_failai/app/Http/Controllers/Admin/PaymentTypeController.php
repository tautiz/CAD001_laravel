<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentsTypeRequest;
use App\Models\PaymentType;

class PaymentTypeController extends Controller
{
    public function index()
    {
        $paymentTypes = PaymentType::all();
        return view('payment_type.index', compact('paymentTypes'));
    }

    public function store(PaymentsTypeRequest $request)
    {
        $paymentType = PaymentType::create($request->all());
        return redirect()->route('paymentTypes.show', $paymentType);
    }

    public function create()
    {
        return view('payment_type.create');
    }

    public function show(PaymentType $paymentType)
    {
        return view('payment_type.show', compact('paymentType'));
    }

    public function edit(PaymentType $paymentType)
    {
        return view('payment_type.edit', compact('paymentType'));
    }

    public function update(PaymentsTypeRequest $request, PaymentType $paymentType)
    {
        $paymentType->update($request->all());
        return redirect()->route('paymentTypes.show', $paymentType);
    }

    public function destroy(PaymentType $paymentType)
    {
        $paymentType->delete();
        return redirect()->route('paymentTypes.index');
    }
}
