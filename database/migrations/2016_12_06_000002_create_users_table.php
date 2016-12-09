
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_password', 256);
            $table->string('user_email', 64);
            $table->string('user_name', 64);
            $table->string('user_role', 64);
            $table->dateTime('user_created_at');
            $table->dateTime('user_updated_at');
            # Indexes
            $table->unique('user_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('users');
    }
}
