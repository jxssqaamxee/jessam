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
        Schema::create('stock_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->string("product_name", 100);
            $table->integer("quantity_added");
            $table->datetime("added_on");
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("product")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_history');
    }
};
