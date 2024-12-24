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
        Schema::create('tbl_billing_address', function (Blueprint $table) {
            $table->increments('billing_id');
            $table->string('billing_name');
            $table->string('billing_method');
            $table->string('billing_email');
            $table->string('billing_phone');
            $table->string('billing_address');
            $table->integer('billing_status');
            $table->integer('billing_zipcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_billing_address');
    }
};
