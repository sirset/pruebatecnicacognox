<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\transactionsModel;

class transactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ["accountOrigin_id"=> 1,"accountDestination_id"=> 2,"money"=>100.12,"code"=>"202106121420321"],
            ["accountOrigin_id"=> 2,"accountDestination_id"=> 1,"money"=>50,"code"=>"202106121120322"],
            ["accountOrigin_id"=> 3,"accountDestination_id"=> 1,"money"=>250,"code"=>"202106121320323"],
        ];
        foreach($datas as $data){
            transactionsModel::create($data);
        }
    }
}
