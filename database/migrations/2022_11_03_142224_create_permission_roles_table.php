<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_roles', function (Blueprint $table) {


$table->integer('permission_Id')->unsigned();
$table->integer('roles_Id')->unsigned();
$table->foreign('permission_Id')->references('permissionId')->on('permissions')->onDelete('cascade');
$table->foreign('roles_Id')->references('rolesId')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_roles');

    }
}
