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
            $table->string('author');
            $table->boolean('status')->default(1);
            $table->boolean('status_borrowed')->default(0);
            $table->integer('late_charge_fines')->default(5000);
            $table->integer('book_lost_fines')->default(50000);
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('user');

            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('user')->references('id')->on('users');
            
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
