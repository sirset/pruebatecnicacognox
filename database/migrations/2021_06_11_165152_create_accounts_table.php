<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->String("account",50)->unique();
            $table->double("money",12,2);
            $table->timestamps();
            $table->String("status")->default("active");
            $table->unsignedBigInteger("customer_id");

            $table->foreign("customer_id","FK_accounts_Customer")->references("id")->on("customers")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
