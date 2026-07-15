<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->foreignId('store_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('supplier_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name');

            $table->string('sku')
                ->nullable();

            $table->string('barcode')
                ->nullable();

            // Prix d'achat actuel
            $table->decimal('purchase_price', 12, 2)
                ->default(0);

            // Prix de vente actuel
            $table->decimal('selling_price', 12, 2)
                ->default(0);

            // Stock minimum avant alerte
            $table->integer('minimum_stock')
                ->default(0);

            // Unité : pièce, kg, litre...
            $table->string('unit')
                ->default('piece');

            $table->text('description')
                ->nullable();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();


            $table->unique([
                'store_id',
                'sku'
            ]);

            $table->index([
                'store_id',
                'name'
            ]);

            $table->index([
                'barcode'
            ]);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};