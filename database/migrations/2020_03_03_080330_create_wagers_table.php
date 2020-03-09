<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wagers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_wager_value');
            $table->float('odds');
            $table->integer('selling_percentage');
            $table->float('selling_price');

            $table->float('current_selling_price');
            $table->integer('percentage_sold');
            $table->integer('amount_sold');
            $table->timestamp('placed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wagers');
    }
}
