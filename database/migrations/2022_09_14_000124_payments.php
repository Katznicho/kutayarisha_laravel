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
        //
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('plan_id');
            $table->string('amount');

            //status of payment
            $table->string('status');
            //externalReference
            $table->string('externalReference');
            //narrative
            $table->string('narrative');
            //phone number
            $table->string('phone');
            //currency
            $table->string('currency');
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
        //
    }
};
