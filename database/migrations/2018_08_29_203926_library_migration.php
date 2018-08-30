<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LibraryMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library',function(Blueprint $table){

            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('fax');
            $table->string('image');
            $table->string('address');
            //$table->string('log');
            //$table->string('lat');
            $table->enum('lang',['en','ar']);
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library');
    }
}
