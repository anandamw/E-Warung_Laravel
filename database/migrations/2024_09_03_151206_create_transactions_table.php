<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();

            $table->string('snap_token')->nullable();
            $table->unsignedBigInteger('produks_id');
            $table->foreign('produks_id')->references('id_produks')->on('produks');

            $table->string('quantity');
            $table->string('sedekah')->nullable();
            $table->string('harga');
            $table->string('total_price');
            $table->enum('status', ['pending', 'success', 'failed']);

            $table->unsignedBigInteger('super_kurir_id')->nullable();
            $table->timestamps();

            $table->foreign('super_kurir_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
