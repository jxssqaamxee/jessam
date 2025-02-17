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
        Schema::create('sales_enrty', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->integer("quality_sold");
            $table->decimal("total_sales");
            $table->date("transaction_date");
            $table->string("customer_name", 100);
            $table->string("address", 100);
            $table->string("number", 100);
            $table->enum("status",["walk-in","delivery"]);
            $table->string("created_by_name", 100);
            $table->enum("created_by_type",["admin", "teller"]);
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("product")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_enrty');
    }
};
