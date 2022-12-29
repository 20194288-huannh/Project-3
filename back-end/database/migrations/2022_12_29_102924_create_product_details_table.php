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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('publisher')->nullable();
            $table->date('publisher_date')->nullable();
            $table->string('publisher_imprint')->nullable();
            $table->string('binding')->nullable();
            $table->string('height')->nullable();
            $table->string('language')->nullable();
            $table->string('no_of_pages')->nullable();
            $table->string('returnable')->nullable();
            $table->string('spine_width')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('width')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('product_details');
    }
};
