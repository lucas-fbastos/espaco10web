<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgImovel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_imovel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('imovel_id');
            $table->foreign('imovel_id')
                  ->references('id')->on('imovels')
                  ->onDelete('cascade');
            $table->string('img_path');
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
        Schema::dropIfExists('img_imovel');
    }
}
