<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimsumsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimsums', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('name', 255);
            $table->enum('dishtype', array('S', 'M', 'L', 'X', 'D'));
            $table->string('pic_path');
            $table->integer('stocks');
            $table->decimal('price', 5, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dimsums');
    }

}
