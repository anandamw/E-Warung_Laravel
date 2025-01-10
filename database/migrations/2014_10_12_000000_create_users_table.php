<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('token_users')->unique();
            $table->string('no_telepon');
            $table->string('name')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('alamat_users')->nullable();
            $table->string('foto_profile')->nullable();
            $table->timestamp('last_seen')->nullable();

            $table->enum('role', ["admin", "mitra", "customer", "kurir", "superkurir"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        Schema::dropIfExists('users');
    }
};
