<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('typeThreat', 200);
           // $table->string('image');
         //   $table->unsignedBigInteger('threats_titles_id'); 
            $table->timestamps();
          //  $table->foreign('threats_titles_id')
            //    ->references('id')
              //  ->on('threats_titles')
               // ->onDelete('cascade')
                //->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
