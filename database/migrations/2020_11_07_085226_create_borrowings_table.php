<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book');
            $table->unsignedBigInteger('member');
            $table->date('date_must_back');
            $table->date('date_back')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('status_fines')->default(0);

            $table->foreign('member')->references('id')->on('members');
            $table->foreign('book')->references('id')->on('books');

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
        Schema::dropIfExists('borrowings');
    }
}
