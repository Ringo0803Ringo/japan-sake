<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // idカラムの後に追加
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // 外部キー制約を削除
            $table->dropColumn('user_id'); // カラムを削除
        });
    }
};
