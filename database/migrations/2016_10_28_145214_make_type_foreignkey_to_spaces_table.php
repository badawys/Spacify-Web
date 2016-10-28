<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeTypeForeignkeyToSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                schema::table('spaces', function (Blueprint $table) {
                $table->foreign('type')->references('id')->on('types')->change();
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
            $table->dropForeign('spaces_type_foreign');
        });
        }

}
