<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\registeredAccountModel;


class registeredAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ["customer_id"=>1,"account_id"=>3],
            ["customer_id"=>1,"account_id"=>4],
            ["customer_id"=>2,"account_id"=>4]
        ];
        foreach($datas as $data){
            registeredAccountModel::create($data);
        }
    }
}
