<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('status')->default('active')->comment('active: hiển thị, hidden: ẩn');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();

            // Khóa ngoại với users
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Khóa ngoại với products
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Khóa ngoại tự tham chiếu cho reply
            $table->foreign('parent_id')
                ->references('id')
                ->on('comments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Index cho các trường thường dùng để tìm kiếm
            $table->index('status');
            $table->index('created_at');
            $table->index(['user_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Xóa khóa ngoại trước khi xóa bảng
            $table->dropForeign(['user_id']);
            $table->dropForeign(['product_id']);
            $table->dropForeign(['parent_id']);

            // Xóa index
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
            $table->dropIndex(['user_id', 'product_id']);
        });

        Schema::dropIfExists('comments');
    }
};
