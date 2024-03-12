<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('subscription_type_id')->nullable()->constrained('subscription_types')->nullOnDelete();
            $table->date("start_date");
            $table->date("end_date");
            $table->string("mode_of_payment");
            $table->string("reference_number")->nullable();
            $table->float("amount_paid");
            $table->tinyInteger('status')->default(2); //1 = pending, 2 = active, 3 = cancelled
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
        Schema::dropIfExists('subscriptions');
    }
}
