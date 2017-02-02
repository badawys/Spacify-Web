<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type')->unsigned();
            $table->double('lng', 10, 6);
            $table->double('lat', 10, 6);
            $table->json('data')->nullable();
            $table->string('photo');
            $table->string('description');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type')
                ->references('id')
                ->on('spaces_types');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('spaces');
    }
}
