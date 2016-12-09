
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     * @table posts
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('post_title', 256);
            $table->string('post_image', 256);
            $table->text('post_content');
            $table->string('post_tags', 256);
            $table->integer('post_status');
            $table->dateTime('post_created_at');
            $table->dateTime('post_updated_at');
            $table->string('post_category', 64);
            $table->string('post_author', 64);
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

        Schema::drop('posts');
    }
}
