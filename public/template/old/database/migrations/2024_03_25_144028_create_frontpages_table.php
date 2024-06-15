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
        Schema::create('frontpages', function (Blueprint $table) {
            $table->id();
            $table->string('mission_title1_lid')->nullable();
            $table->string('mission_title1_len')->nullable();
            $table->string('mission_title2_lid')->nullable();
            $table->string('mission_title2_len')->nullable();
            $table->text('mission_decs_lid')->nullable();
            $table->text('mission_decs_len')->nullable();
            $table->string('mission_image')->nullable();

            $table->string('advantage_title_lid')->nullable();
            $table->string('advantage_title_len')->nullable();

            $table->string('advantage1_title_lid')->nullable();
            $table->string('advantage1_title_len')->nullable();
            $table->text('advantage1_desc_lid')->nullable();
            $table->text('advantage1_desc_len')->nullable();

            $table->string('advantage2_title_lid')->nullable();
            $table->string('advantage2_title_len')->nullable();
            $table->text('advantage2_desc_lid')->nullable();
            $table->text('advantage2_desc_len')->nullable();

            $table->string('advantage3_title_lid')->nullable();
            $table->string('advantage3_title_len')->nullable();
            $table->text('advantage3_desc_lid')->nullable();
            $table->text('advantage3_desc_len')->nullable();

            $table->string('product_title_lid')->nullable();
            $table->string('product_title_len')->nullable();
            $table->string('product_popular_title_lid')->nullable();
            $table->string('product_popular_title_len')->nullable();

            $table->string('work_title_lid')->nullable();
            $table->string('work_title_len')->nullable();
            $table->string('work_image')->nullable();

            $table->string('study_title_lid')->nullable();
            $table->string('study_title_len')->nnullable();
            $table->text('study_decs_lid')->nullable();
            $table->text('study_decs_len')->nullable();

            $table->string('study1_title_lid')->nullable();
            $table->string('study1_title_len')->nullable();
            $table->text('study1_url')->nullable();

            $table->string('study2_title_lid')->nullable();
            $table->string('study2_title_len')->nullable();
            $table->text('study2_url')->nullable();

            $table->string('study3_title_lid')->nullable();
            $table->string('study3_title_len')->nullable();
            $table->text('study3_url')->nullable();

            $table->string('partner_title_lid')->nullable();
            $table->string('partner_title_len')->nullable();

            $table->string('cto_title_lid')->nullable();
            $table->string('cto_title_len')->nullable();
            $table->string('cto_button_lid')->nullable();
            $table->string('cto_button_len')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontpages');
    }
};
