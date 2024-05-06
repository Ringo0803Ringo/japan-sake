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
            $table->unsignedBigInteger('brand_id')->after('id'); // idカラムの後に追加
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign(['brand_id']); // 外部キー制約を削除
            $table->dropColumn('brand_id'); // カラムを削除
        });
    }
};
