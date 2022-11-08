<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomertourserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_tour_service', function (Blueprint $table) {

$table->integer('customer_Id')->unsigned();
$table->integer('tour_Id')->unsigned();
$table->foreign('customer_Id')->references('customerId')->on('customers')->onDelete('cascade');
$table->foreign('tour_Id')->references('tourId')->on('tour_service')->onDelete('cascade');
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
        Schema::dropIfExists('customer_tour_service');
    }
}
