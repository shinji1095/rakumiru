<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments("id");
            $table->integer("userID")->unsigned();
            $table->integer("amount");
            $table->string("item");
            $table->boolean("status");
            $table->timestamps();

            //外部キー制約
            $table->foreign("userID")
                    ->references("id")
                    ->on("entries");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outgoes');
    }
}
