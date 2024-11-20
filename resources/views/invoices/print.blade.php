<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    @vite(['resources/css/app.css','resources/sass/app.scss'])
</head>
<body class="tw-bg-gray-100 tw-p-10">
    <div class="tw-max-w-3xl tw-mx-auto tw-bg-white tw-rounded-lg tw-shadow-lg">
        
        <!-- Invoice Header -->
        <div class="tw-bg-success tw-text-white tw-p-8 tw-rounded-t-lg tw-text-center">
            <h1 class="tw-text-3xl tw-font-bold tw-mb-1">Nota</h1>
            <p class="tw-text-sm tw-opacity-80">#{{ $order->order_number }}</p>
            <p class="tw-text-sm tw-opacity-80">{{ $order->created_at->format('d M Y') }}</p>
            <p class="tw-text-sm tw-opacity-80">Atas Nama: {{ $order->customer->customer_name ?? 'N/A' }}</p>
        </div>

        <!-- Invoice Table -->
        <div class="tw-p-8">
            <table class="tw-w-full tw-border-collapse">
                <thead>
                    <tr class="tw-bg-gray-200">
                        <th class="tw-py-3 tw-px-4 tw-text-left tw-font-semibold tw-text-sm tw-border-b">Item</th>
                        <th class="tw-py-3 tw-px-4 tw-text-center tw-font-semibold tw-text-sm tw-border-b">Jumlah Barang</th>
                        <th class="tw-py-3 tw-px-4 tw-text-center tw-font-semibold tw-text-sm tw-border-b">Satuan</th>
                        <th class="tw-py-3 tw-px-4 tw-text-right tw-font-semibold tw-text-sm tw-border-b">Harga</th>
                        <th class="tw-py-3 tw-px-4 tw-text-right tw-font-semibold tw-text-sm tw-border-b">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->invoice as $invoice)
                        <tr class="tw-border-b">
                            <td class="tw-py-3 tw-px-4 tw-text-sm">{{ $invoice->product->product_name }}</td>
                            <td class="tw-py-3 tw-px-4 tw-text-center tw-text-sm">{{ $invoice->qty}}</td>
                            <td class="tw-py-3 tw-px-4 tw-text-center tw-text-sm">{{  $invoice->product->unit->unit_name }}</td>
                            <td class="tw-py-3 tw-px-4 tw-text-right tw-text-sm">{{ number_format($invoice->price,2,',','.') }}</td>
                            <td class="tw-py-3 tw-px-4 tw-text-right tw-text-sm">{{ number_format($invoice->subtotal, 2,',','.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Invoice Total -->
        <div class="tw-p-8 tw-flex tw-justify-end">
            <div class="tw-bg-success tw-text-white tw-py-2 tw-px-6 tw-rounded-lg tw-font-bold tw-text-lg">
                Total: Rp. {{ number_format($order->total, 2,',','.') }}
            </div>
        </div>

        <!-- Payment Method and Terms -->
        <div class="tw-p-8 tw-border-t">
            <p class="tw-text-sm"><span class="tw-font-semibold">Terimakasih Sudah Berbelanja 😊</span></p>
        </div>
    </div>

    <!-- Auto-print Script -->
    <script>
        window.print();
    </script>
    @vite(['resources/js/app.js'])
</body>
</html>
