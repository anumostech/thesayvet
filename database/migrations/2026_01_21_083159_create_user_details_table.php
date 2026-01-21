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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('first_name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('email', 150)->unique();
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->enum('type', ['admin', 'sales', 'accounts', 'warehouse']);
            $table->softDeletes(); 
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
