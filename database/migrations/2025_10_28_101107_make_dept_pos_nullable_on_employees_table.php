<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function(Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropForeign(['position_id']);

            $table->foreignId('department_id')->nullable()->change();
            $table->foreignId('position_id')->nullable()->change();

            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreign('position_id')->references('id')->on('positions')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('employees', function(Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropForeign(['position_id']);
            
            $table->foreignId('department_id')->nullable(false)->change();
            $table->foreignId('position_id')->nullable(false)->change();
        });
    }
};
