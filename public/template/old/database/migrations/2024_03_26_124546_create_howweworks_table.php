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
        Schema::create('howweworks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nu')->default(0);
            $table->string('title_lid')->nullable();
            $table->string('title_len')->nullable();
            $table->text('desc_lid')->nullable();
            $table->text('desc_len')->nullable();
            $table->bigInteger('f_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('howweworks');
    }
};
