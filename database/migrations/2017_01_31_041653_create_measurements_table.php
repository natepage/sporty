<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration
{
    const TABLE = 'measurements';

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
            $table->float('sholders')->nullable();
            $table->float('left_arm')->nullable();
            $table->float('right_arm')->nullable();
            $table->float('chest')->nullable();
            $table->float('waist')->nullable();
            $table->float('left_thigh')->nullable();
            $table->float('right_thigh')->nullable();
            $table->float('left_calf')->nullable();
            $table->float('right_calf')->nullable();
            $table->float('weight');
            $table->text('feeling')->nullable();
            $table->string('images')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
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
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists(self::TABLE);
    }
}
