<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('random_post_id');
            $table->text('description');
            $table->integer('city_id');
            $table->integer('category_id');
            $table->string('location')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('service_for')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('incall')->nullable();
            $table->string('outcall')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('breast')->nullable();
            $table->string('name');
            $table->string('age');
            $table->enum('status', ['approved', 'pending', 'flagged'])->default('approved');
            $table->integer('package_id')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
