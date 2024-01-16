<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('withdraw', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_wallet');
            $table->string('name');
            $table->longText('token');
            $table->longText('status');
            $table->decimal('value', 10,2);
            $table->date('data_output');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('withdraw');
    }
};
