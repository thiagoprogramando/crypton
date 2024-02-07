<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpfcnpj');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('custumer')->nullable();
            $table->integer('type');
            $table->string('postal_code')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('locality')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
