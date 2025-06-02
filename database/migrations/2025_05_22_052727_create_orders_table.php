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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("reference_no")->unique();
            $table->foreignId("user_id");
            $table->string("amount");
            $table->string("notes")->nullable();
            $table->foreignId("employee_id")->nullable();
            $table->string("status")->default(1)->comment("1: Pending, 2: Preparing 3: OnBoard 3: Delivered 4: Canceled");
            $table->string("address_id");
            $table->string("discount");
            $table->string("sub_total");
            $table->string("grand_total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
