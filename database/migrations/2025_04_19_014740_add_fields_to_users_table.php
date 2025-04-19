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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 50)->unique()->after('id');
            $table->string('full_name', 100)->after('name');
            $table->string('phone', 20)->unique()->after('email');
            $table->tinyInteger('status')->default(1)->after('phone');
            $table->string('avatar', 255)->nullable()->after('status');
            $table->text('shipping_address')->nullable()->after('avatar');
            $table->enum('gender', ['M', 'F', 'O'])->nullable()->after('shipping_address');

            // Xóa trường name cũ nếu không cần
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
