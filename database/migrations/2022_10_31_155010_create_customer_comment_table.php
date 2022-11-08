<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_comment', function (Blueprint $table) {
            
$table->integer('customer_Id')->unsigned();
$table->integer('com_Id')->unsigned();
$table->foreign('customer_Id')->references('customerId')->on('customers')->onDelete('cascade');
$table->foreign('com_Id')->references('comId')->on('comments')->onDelete('cascade');
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
        Schema::dropIfExists('customer_comment');
    }
}
