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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
    $table->string('nombre');
    $table->text('descripcion')->nullable();
    $table->decimal('precio', 8, 2);
    $table->integer('stock');
    $table->unsignedBigInteger('proveedor_id');

    $table->string('imagen')->nullable();
    $table->timestamps();
    $table->softDeletes();

    $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
