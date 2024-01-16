<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('wallet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_product');
            $table->string('name');
            $table->string('token')->unique()->nullable();
            $table->integer('status');
            $table->decimal('value', 10, 2);
            $table->decimal('value_profitability', 10, 2);
            $table->date('date_output');
            $table->integer('invest_output');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('product')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('wallet');
    }
};
