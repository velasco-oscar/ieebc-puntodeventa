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
        Schema::table('detalle_ventas', function (Blueprint $table) {
            $table->bigInteger('venta_id')->unsigned()->after('id');
            $table->bigInteger('producto_id')->unsigned()->after('venta_id');
            $table->integer('cantidad')->after('producto_id');
            $table->decimal('precio_unitario', 8, 2)->after('cantidad');
            $table->decimal('subtotal', 8, 2)->after('precio_unitario');

            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalle_ventas', function (Blueprint $table) {
            $table->dropForeign(['venta_id']);
            $table->dropForeign(['producto_id']);
            $table->dropColumn(['venta_id', 'producto_id', 'cantidad', 'precio_unitario', 'subtotal']);
        });
    }
};
