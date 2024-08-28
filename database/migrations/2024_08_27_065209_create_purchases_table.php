<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id('id_purchase');
            $table->foreignId('id_buyer')->constrained('users', 'id_user');
            $table->foreignId('id_seller')->constrained('users', 'id_user');
            $table->foreignId('id_product')->constrained('products', 'id_product');
            $table->string('buying_method');
            $table->string('delivery_method');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
