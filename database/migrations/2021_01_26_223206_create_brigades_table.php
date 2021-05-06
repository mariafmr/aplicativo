<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrigadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brigades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('telephone')->nullable();
            $table->string('cellphone');
            $table->string('landline')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('charge_id'); 
            $table->timestamps();
            $table->foreign('charge_id')
                ->references('id')
                ->on('charges')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table->unsignedBigInteger('names_id'); 
            $table->foreign('names_id')
                ->references('id')
                ->on('charges')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brigades');
    }
}
