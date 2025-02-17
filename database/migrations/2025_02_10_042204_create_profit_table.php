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
        Schema::create('profit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("stock_id");
            $table->decimal("profits");
            $table->date("transaction_date");
            $table->timestamps();
            $table->foreign("stock_id")->reference("id")->on("stock")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profit');
    }
};
   