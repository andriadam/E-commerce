<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('discount_id')->nullable();
            $table->unsignedInteger('discount')->nullable();
            // $table->string('no_rek', 20)->nullable();
            // $table->string('bank_name', 20)->nullable();
            // $table->date('transfer_date')->nullable();
            $table->unsignedInteger('total')->default(0);
            $table->string('statusPayment')->default('Waiting Payment');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
