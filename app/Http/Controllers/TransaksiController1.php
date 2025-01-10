<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TransaksiController extends Controller
{
    public function getSnapToken(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'amount' => 'required|numeric|min:1000',
        ]);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');

        $orderId = uniqid();
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $request->amount,
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // Save transaction to database
        Transaction::create([
            'order_id' => $orderId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return response()->json(['snap_token' => $snapToken]);
    }

    public function processPayment(Request $request)
    {

        $validatedData = $request->validate([
            'json' => 'required|json',
        ]);

        // Decode JSON
        $json = json_decode($request->json, true);

        // Validasi data di dalam JSON
        if (!isset($json['order_id']) || !isset($json['transaction_status'])) {
            return redirect()->route('home')->withErrors('Invalid payment data.');
        }

        // Cek apakah transaksi dengan order_id tersebut ada
        $transaction =  Transaction::where('order_id', $json['order_id'])->first();

        if ($transaction) {
            // Update status transaksi
            $transaction->update([
                'status' => $json['transaction_status'],
                'payment_response' => $request->json,
            ]);

            return redirect()->route('home')->with('status', 'Payment ' . $json['transaction_status']);
        } else {
            return redirect()->route('home')->withErrors('Transaction not found.');
        }
    }
}
