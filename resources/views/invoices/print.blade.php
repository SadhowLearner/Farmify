<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faktur Pembayaran</title>
    @vite(['resources/css/app.css','resources/sass/app.scss'])
</head>
<body>
    <body class="tw-bg-gray-100 tw-p-10">
        <div class="tw-max-w-3xl tw-mx-auto tw-bg-white tw-rounded-lg tw-shadow-lg tw-p-10">
            <div class="tw-text-center tw-mb-4">
                <h1 class="tw-text-2xl tw-font-bold">Invoice</h1>
            </div>
    
            <!-- Invoice Header -->
            <div class="tw-mb-4">
                <p><span class="tw-font-bold">Order Number:</span> {{ $order->order_number }}</p>
                <p><span class="tw-font-bold">Customer Name:</span> {{ $order->customer->customer_name ?? 'N/A' }}</p>
                <p><span class="tw-font-bold">Order Date:</span> {{ $order->created_at->format('d M, Y') }}</p>
            </div>
    
            <!-- Invoice Table -->
            <table class="tw-w-full tw-table-auto tw-border tw-rounded-lg">
                <thead>
                    <tr class="tw-bg-gray-200">
                        <th class="tw-py-2 tw-px-4 tw-text-left">Product</th>
                        <th class="tw-py-2 tw-px-4 tw-text-center">Quantity</th>
                        <th class="tw-py-2 tw-px-4 tw-text-right">Unit Price</th>
                        <th class="tw-py-2 tw-px-4 tw-text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->invoice as $invoice)
                        <tr class="tw-border">
                            <td class="tw-py-2 tw-px-4">{{ $invoice->product->product_name }}</td>
                            <td class="tw-py-2 tw-px-4 tw-text-center">{{ $invoice->qty }}</td>
                            <td class="tw-py-2 tw-px-4 tw-text-right">{{ number_format($invoice->price, 2) }}</td>
                            <td class="tw-py-2 tw-px-4 tw-text-right">{{ number_format($invoice->subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            <!-- Invoice Total -->
            <div class="tw-text-right tw-mt-5">
                <h3 class="tw-text-lg tw-font-bold">Total: {{ number_format($order->total, 2) }}</h3>
            </div>
        </div>
    
        <!-- Auto-print Script -->
        <script>
            window.print();
        </script>
        @vite(['resources/js/app.js'])
</body>
</html>