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
            $table->id('p_id');
            $table->string('p_title')->nullable();
            $table->string('p_supplier')->nullable();
            $table->string('p_image')->nullable();
            $table->text('p_description')->nullable();
            $table->float('p_price',9,2)->nullable();
            $table->text('p_location')->nullable();
            $table->softDeletes();
            $table->timestamp('p_created_at')->nullable();
            $table->timestamp('p_updated_at')->nullable();
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
