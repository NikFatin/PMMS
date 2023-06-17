<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payment/index', ['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payment = Payment::create([
            'user_id' => Auth::user()->id,           
            'method' => $request->method,
            'date' => $request->created_at, // Assign created_at timestamp to date field
            'time' => $request->created_at, // Assign editd_at timestamp to time field
            'status' => $request->status,
            'total' => $request->total,
        ]);

        return redirect(route('payment.index', $payment->id));

    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * edit the specified resource in storage.
     */
    public function edit(Payment $payment)
    {
        return view('payment/edit', ['payment' => $payment]);

    }

    public function update(Request $request, Payment $payment)
    {
        $payment->total = $request->total;
        $payment->update();

        return redirect()->route('payment.index', [$payment->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect(route('payment.index'));
    }


}
