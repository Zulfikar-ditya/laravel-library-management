<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('status')->default(1)->change();
            $table->integer('late_charge_fines')->default(5000)->change();
            $table->integer('book_lost_fines')->default(50000)->change();
            $table->unsignedBigInteger('category');

            $table->foreign('category')->references('id')->on('categories');
            
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
        Schema::dropIfExists('books');
    }
}
