<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeUserIdForeignkeyToSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('spaces', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        schema::table('spaces', function (Blueprint $table) {
            $table->dropForeign('spaces_user_id_foreign');
        });
    }
}
