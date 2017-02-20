<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    const TABLE = 'series';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function(Blueprint $table) {
            $table->increments('id');
            $table->string('series')->nullable();

            $table->integer('exercise_id')->unsigned();
            $table->foreign('exercise_id')->references('id')->on('exercises')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->integer('workout_id')->unsigned();
            $table->foreign('workout_id')->references('id')->on('workouts')
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
            $table->dropForeign(['exercise_id']);
        });
        Schema::table(self::TABLE, function(Blueprint $table) {
            $table->dropForeign(['workout_id']);
        });
        Schema::dropIfExists(self::TABLE);
    }
}
