<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('description',500);
            $table->string('image',100);
            $table->string('facebook',100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('web', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->integer('counter')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sponsors');
    }
}
