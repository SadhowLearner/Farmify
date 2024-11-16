<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{

    use HasFactory;

    protected static function booted()
    {
        static::created(function ($invoice) {
            // Mengambil produk terkait
            $product = $invoice->product;
            
            // Mengurangi stok berdasarkan qty yang ada di invoice
            if ($product && $invoice->qty) {
                $product->decrement('stock', $invoice->qty);
            }
        });
    }
    
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
