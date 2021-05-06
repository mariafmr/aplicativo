<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvacuationPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evacuation_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content')->nullable();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('brigade_id');
            $table->unsignedBigInteger('brigade1_id');
            $table->unsignedBigInteger('brigade2_id');
            $table->unsignedBigInteger('brigade3_id');
            $table->unsignedBigInteger('brigade4_id');
            $table->unsignedBigInteger('brigade5_id');
           // $table->unsignedBigInteger('block_id'); 
            $table->timestamps();
            $table->foreign('brigade_id')
                ->references('id')
                ->on('brigades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('brigade1_id')
                ->references('id')
                ->on('brigades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('brigade2_id')
                ->references('id')
                ->on('brigades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('brigade3_id')
                ->references('id')
                ->on('brigades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('brigade4_id')
                ->references('id')
                ->on('brigades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('brigade5_id')
                ->references('id')
                ->on('brigades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
          /*  $table->foreign('block_id')
                ->references('id')
                ->on('blocks')
                ->onDelete('cascade')
                ->onUpdate('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evacuation_points');
    }
}
