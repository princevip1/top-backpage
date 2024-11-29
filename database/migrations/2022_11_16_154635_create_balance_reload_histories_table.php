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
        Schema::create('balance_reload_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('amount');
            $table->string('resolved_amount')->nullable();
            $table->enum('status', ['pending', 'success', 'failed', 'created'])->default('created');
            $table->enum('admin_approval', ['approved', 'pending'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->string('address')->nullable();
            $table->string('charge_code')->nullable();
            $table->string('charge_id')->nullable();
            $table->enum('payment_method', ['bitcoin', 'paypal', 'card'])->default('bitcoin');
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
        Schema::dropIfExists('balance_reload_histories');
    }
};
