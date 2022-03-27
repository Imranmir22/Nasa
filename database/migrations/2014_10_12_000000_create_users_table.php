<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('state');
            $table->string('district');
            $table->string('address');
            $table->unsignedBigInteger('pincode');
            $table->string('email')->unique();
            $table->unsignedBigInteger('phone')->unique();
            $table->json('id_card')->nullable();
            $table->enum('role', ['admin', 'user', 'broker'],'user')->default('user');;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('is_verified', ['true','false'],'false')->default('false');;
            $table->enum('status', ['active','archived'],'active')->default('active');;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
