<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW vista_transactions AS select `acc1`.`account` AS `origen`,`acc2`.`account` AS `destino`,`trans`.`money` AS `valor`,`trans`.`created_at` AS `fecha`,`acc1`.`id` AS `accountOrigine`,`acc2`.`id` AS `accountDestino`,`trans`.`code` AS `codigo` from ((`pruebatecnicacognox`.`transactions` `trans` join `pruebatecnicacognox`.`accounts` `acc1` on((`trans`.`accountOrigin_id` = `acc1`.`id`))) join `pruebatecnicacognox`.`accounts` `acc2` on((`trans`.`accountDestination_id` = `acc2`.`id`)));");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW vista_transactions");
    }
}
