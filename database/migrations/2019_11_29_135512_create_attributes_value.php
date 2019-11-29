<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributesValue', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('attributeGroup_id');
            $table->foreign('attributeGroup_id')->references('id')->on('attributesGroup')->onDelete('cascade');
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
        Schema::dropIfExists('attributeValue');
    }
}
