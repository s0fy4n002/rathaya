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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pic_id');
            $table->string('name')->nullable()->index();
            $table->string('name_slug')->nullable()->index();
            $table->bigInteger('priceretailer')->default(0);
            $table->bigInteger('avgsoldmonth')->default(0);
            $table->bigInteger('pricewholesaler')->default(0);
            $table->bigInteger('minpurchasewholesaler')->default(0);
            $table->text('description_lid')->nullable();
            $table->text('description_len')->nullable();
            $table->unsignedBigInteger('commoditycat_id');
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->string('photo5')->nullable();
            $table->bigInteger('f_active')->default(1);
            $table->bigInteger('view')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
