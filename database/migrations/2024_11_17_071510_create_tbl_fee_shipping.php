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
        Schema::create('tbl_fee_shipping', function (Blueprint $table) {
            $table->increments('fee_id');
            $table->integer('fee_city_id');
            $table->integer('fee_district_id');
            $table->integer('fee_ward_id');
            $table->string('fee_feeship');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_fee_shipping');
    }
};
