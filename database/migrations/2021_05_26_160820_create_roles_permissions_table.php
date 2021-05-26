<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {

            $table->primary(['role_id' , 'permission_id']) ;
            $table->unsignedBigInteger('role_id')->unsigned() ;
            $table->unsignedBigInteger('permission_id')->unsigned() ;
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade') ;
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade') ;
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
        Schema::dropIfExists('permission_role');
    }
}
