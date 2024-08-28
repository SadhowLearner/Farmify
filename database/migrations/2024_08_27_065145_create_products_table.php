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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_product');
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->string('product_name');
            $table->decimal('price', 10, 2);
            $table->integer('point');
            $table->enum('type', ['egg', 'milk', 'meat', 'chicken']);
            $table->string('product_photo')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
