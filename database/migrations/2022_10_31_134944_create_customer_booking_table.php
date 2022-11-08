<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerbookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
 Schema::create('customer_booking', function (Blueprint $table) {

$table->integer('customer_Id')->unsigned();
$table->integer('Book_Id')->unsigned();
$table->foreign('customer_Id')->references('customerId')->on('customers')->onDelete('cascade');
$table->foreign('Book_Id')->references('BookId')->on('booking')->onDelete('cascade');
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
        Schema::dropIfExists('customer_booking');
    }
}
