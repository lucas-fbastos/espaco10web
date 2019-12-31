<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImovelsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imovels', function (Blueprint $table) {
            $table->unsignedInteger('suites')->nullable();
            $table->unsignedInteger('banheiros')->nullable();
            $table->unsignedInteger('vagas')->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imovels', function (Blueprint $table) {
            $table->dropColumn('suites');
            $table->dropColumn('banheiros');
            $table->dropColumn('vagas');
        });
    }
}
