<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\customersModel;

class customersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ["name"=>"Andres Echavarria","identification"=>"1082948306","password"=>1234,"status" => "active"],
            ["name"=>"Armando Salas","identification"=>"1082948307","password"=>5678,"status" => "active"],
            ["name"=>"pancracio de jesus","identification"=>"1082948308","password"=>9012,"status" => "active"]
        ];
        
        foreach($datas as $data){
            customersModel::create($data);
        }
        
    }
}
