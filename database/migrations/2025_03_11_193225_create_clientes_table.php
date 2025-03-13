<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('clientes', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('user_id')->nullable();
             $table->string('nombre');
             $table->string('email')->nullable();
             $table->string('telefono')->nullable();
             $table->string('direccion')->nullable();
             $table->timestamps();
             $table->softDeletes();
             
             $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('clientes');
    }
};
