<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->longText('terms');
            $table->integer('min_profitability')->nullable();
            $table->integer('max_profitability')->nullable();
            $table->decimal('min_value', 10, 2)->nullable();
            $table->decimal('max_value', 10, 2)->nullable();
            $table->integer('days_output');
            $table->integer('invest_output');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('product');
    }
};
