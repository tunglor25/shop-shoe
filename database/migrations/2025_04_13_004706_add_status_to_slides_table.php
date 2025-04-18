<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->tinyInteger('status')
                  ->default(1) // 1 là active, 0 là inactive
                  ->after('image'); // Thêm cột status sau cột image (tuỳ chọn)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
