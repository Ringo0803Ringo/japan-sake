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
        Schema::create('flavorTags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brandId');
            $table->json('tagIds'); // MySQLやPostgreSQLの場合、json型が利用可能です
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flavor_tags');
    }
};
