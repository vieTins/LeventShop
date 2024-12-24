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
        Schema::create('tbl_slider', function (Blueprint $table) {
            $table->increments('slider_id');
            $table->string('slider_name');
            $table->string('slider_image');
            $table->text('slider_desc');
            $table->tinyInteger('slider_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_slider');
    }
};
