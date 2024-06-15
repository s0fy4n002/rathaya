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
        Schema::create('firms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('pic_id')->unique();
            $table->string('name')->nullable()->index();
            $table->string('name_slug')->nullable()->index();
            $table->unsignedBigInteger('bentity_id')->nullable();
            $table->string('wanumber')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('province_id')->nullable()->index();
            $table->unsignedBigInteger('regency_id')->nullable()->index();
            $table->string('established')->nullable()->index();
            $table->bigInteger('area')->default(0);
            $table->bigInteger('employee')->default(0);
            $table->unsignedBigInteger('turnovercat_id')->nullable()->index();

            $table->string('urlweb')->nullable();
            $table->string('urlmedsos')->nullable();
            $table->string('urlmarket1')->nullable();
            $table->string('urlmarket2')->nullable();
            $table->string('photo')->nullable();
            $table->string('document')->nullable();
            $table->text('description_lid')->nullable();
            $table->text('description_len')->nullable();
            $table->unsignedBigInteger('verification_id')->default(0)->index();
            $table->bigInteger('view')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firms');
    }
};
