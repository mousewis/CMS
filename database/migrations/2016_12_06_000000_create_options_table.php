
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     * @table options
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('opt_id');
            $table->string('opt_name', 64);
            $table->string('opt_detail', 256)->nullable()->default(NULL);
            $table->dateTime('opt_updated_at')->nullable()->default(NULL);
            # Indexes
            $table->unique('opt_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('options');
    }
}
