<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('userImage');
            $table->string('dob');
            $table->string('userType');
            $table->string('status');
            $table->string('tokenId');
            $table->timestamps();
           
        });
        // Schema::create('salary_variables', function (Blueprint $table) {
        //     $table->increments('ID');
        //     $table->string('variableName');
        //     $table->string('addedBy');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
