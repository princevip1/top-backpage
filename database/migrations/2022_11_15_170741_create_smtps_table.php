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
        Schema::create('smtps', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("sender");
            $table->string("host");
            $table->string("port");
            $table->string("protocol");
            $table->string("username");
            $table->string("password");
            $table->enum("type", ['global_smtp', 'specefic_smtp'])->default("global_smtp");
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
        Schema::dropIfExists('smtps');
    }
};
