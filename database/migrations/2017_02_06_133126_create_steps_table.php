<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    const TABLE = 'steps';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function(Blueprint $table) {
            $table->increments('id');
            $table->float('rest_between');
            $table->string('rest_between_unit');
            $table->float('rest_after');
            $table->string('rest_after_unit');
            $table->string('pace');
            $table->integer('order');
            $table->integer('nb_series');
            $table->integer('nb_repetitions');

            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('exercise_id')->unsigned();
            $table->foreign('exercise_id')->references('id')->on('exercises')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::TABLE, function(Blueprint $table) {
            $table->dropForeign(['level_id']);
        });
        Schema::table(self::TABLE, function(Blueprint $table) {
            $table->dropForeign(['exercise_id']);
        });
        Schema::dropIfExists(self::TABLE);
    }
}
