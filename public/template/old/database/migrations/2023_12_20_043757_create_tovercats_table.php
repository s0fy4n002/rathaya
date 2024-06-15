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
        // Schema::create('tovercats', function (Blueprint $table) {
        Schema::create('m_tovercat', function (Blueprint $table) {
            $table->id();
            $table->string('name_lid')->index();
            $table->string('cat_lid')->index();
            $table->string('name_len')->index();
            $table->string('cat_len')->index();
            $table->bigInteger('f_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('tovercats');
        Schema::dropIfExists('m_tovercat');
    }
};
