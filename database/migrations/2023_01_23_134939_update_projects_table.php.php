<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
            //creo colonna della foreign key
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            //assegno la foreign key alla colonna creata
            $table->foreign('type_id')
                    ->references('id')
                    ->on('types')
                    ->onDelete('set null'); //quando viene eliminata una categoria nella tabella sara poi null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function(Blueprint $table) {
            //elimino la FK
            $table->dropForeign(['type_id']);
            //faccio il drop della colonna
            $table->dropColumn('type_id');
        });
    }
};
