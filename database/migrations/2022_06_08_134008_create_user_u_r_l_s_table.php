<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserURLSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_u_r_l_s', function (Blueprint $table) {
            $table->id();

            $table->mediumText('url')->required();
            $table->string('shortend_hash', 10);
            $table->timestamp('last_visited_at')->nullable();
            $table->integer('hits_count')->unsigned()->nullable()->default(0);

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
        Schema::dropIfExists('user_u_r_l_s');
    }
}
