<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            // Drop foreign key lama kalau ada
            $table->dropForeign(['head_employee_id']);

            // Drop kolom lama
            $table->dropColumn('head_employee_id');
        });

        Schema::table('departments', function (Blueprint $table) {
            // Buat ulang kolom dengan definisi yang benar
            $table->foreignId('head_employee_id')
                ->nullable()
                ->constrained('employees')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['head_employee_id']);
            $table->dropColumn('head_employee_id');
        });
    }
};
