<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function print($orderId)
    {
        $order = Order::where('id', $orderId)->with('customer','invoice.product')->firstOrFail();

        return view('invoices.print', compact('order'));
    }
}
