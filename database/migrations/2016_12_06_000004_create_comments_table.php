
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     * @table comments
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comm_id');
            $table->integer('comm_post');
            $table->dateTime('comm_created_at');
            $table->string('comm_email', 256);
            $table->string('comm_name', 256);
            $table->string('comm_content', 256);
            # Indexes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('comments');
    }
}
