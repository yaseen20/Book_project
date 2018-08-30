<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books',function(Blueprint $table){
            //$table->integer('library_id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('catagory');
           // $table->foreign('library_id')->reference('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        

}
}