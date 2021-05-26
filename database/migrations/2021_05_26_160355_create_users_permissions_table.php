<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_user', function (Blueprint $table) {
            $table->primary(['user_id' , 'permission_id']) ;
            $table->unsignedBigInteger('user_id')->unsigned() ;
            $table->unsignedBigInteger('permission_id')->unsigned() ;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade') ;
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
        Schema::dropIfExists('permission_user');
    }
}
