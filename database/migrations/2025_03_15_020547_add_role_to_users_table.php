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
        Schema::table('users', function (Blueprint $table) {
            // Opción 1: campo string para almacenar el rol, por ejemplo: 'admin', 'user'
            $table->string('role')->default('user')->after('email');
            // Opción 2: campo booleano para indicar si es administrador
            // $table->boolean('is_admin')->default(false)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            // o $table->dropColumn('is_admin');
        });
    }
};
