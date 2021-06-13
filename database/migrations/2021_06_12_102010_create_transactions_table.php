<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("accountOrigin_id");
            $table->unsignedBigInteger("accountDestination_id");
            $table->double("money",12,2);
            $table->String("code",20)->unique();
            $table->timestamps();

            $table->foreign("accountOrigin_id","FK_accountOrigin_id")->references("id")->on("accounts")->onUpdate("cascade");
            $table->foreign("accountDestination_id","FK_accountDestination_id")->references("id")->on("accounts")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
