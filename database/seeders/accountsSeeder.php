<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\accountsModel;
Use App\Models\customersModel;

class accountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ["account"=>"120012403928","money"=>1000000,"customer_id"=>1],
            ["account"=>"120012403930","money"=>50000000,"customer_id"=>1],
            ["account"=>"120012403212","money"=>55000000,"customer_id"=>2],
            ["account"=>"120012403933","money"=>453123.22,"customer_id"=>3]
        ];
        foreach ($datas as $data) {
            accountsModel::create($data);
        }
    }
}
