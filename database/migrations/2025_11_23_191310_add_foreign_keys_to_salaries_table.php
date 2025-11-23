<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('salaries', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id')->nullable()->after('karyawan_id');
            $table->unsignedBigInteger('jabatan_id')->nullable()->after('department_id');
            
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('salaries', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropForeign(['jabatan_id']);
            $table->dropColumn(['department_id', 'jabatan_id']);
        });
    }
};
