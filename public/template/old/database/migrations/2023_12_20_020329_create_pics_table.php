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
        Schema::create('pics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            // $table->string('ran')->nullable(); // from tabel users
            $table->string('name')->nullable()->index(); // harus sama di tabel users
            $table->string('email')->nullable()->index();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->string('idnumber')->nullable()->index();
            $table->string('idphoto')->nullable();
            $table->string('address')->nullable(); // string atao text? sesuai ktp
            $table->unsignedBigInteger('province_id')->nullable()->index();
            $table->unsignedBigInteger('regency_id')->nullable()->index();
            $table->unsignedBigInteger('district_id')->nullable()->index();
            $table->unsignedBigInteger('village_id')->nullable()->index();
            $table->string('villagename')->nullable()->index();
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
        Schema::dropIfExists('pics');
    }
};
