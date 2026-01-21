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
            $table->id(); 
            $table->unsignedBigInteger('category_id')->index();
            $table->string('product_name', 255);
            $table->string('product_image', 255);
            $table->string('product_code', 100)->unique();
            $table->string('dosage_form', 100); 
            $table->decimal('quantity', 10, 2); 
            $table->enum('unit', ['ml', 'l', 'gm', 'kg']);
            $table->string('manufacturer', 255)->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes(); 
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
