<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutsTable extends Migration
{
    const TABLE = 'workouts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')
                ->onDelete('restrict')
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
        Schema::dropIfExists(self::TABLE);
    }
}
