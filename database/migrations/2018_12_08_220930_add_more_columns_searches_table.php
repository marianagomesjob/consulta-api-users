<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnsSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('searches', function (Blueprint $table) {
            $table->longText('basic')->after('cpf')->nullable();
            $table->longText('emails')->after('basic')->nullable();
            $table->longText('phones')->after('emails')->nullable();
            $table->longText('result')->after('phones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('searches', function (Blueprint $table) {
            $table->dropColumn('basic');
            $table->dropColumn('emails');
            $table->dropColumn('phones');
            $table->dropColumn('result');
        });
    }
}
