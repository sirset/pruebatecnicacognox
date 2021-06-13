<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customersModel extends Model
{
    use HasFactory;

    protected $table = "customers";
    protected $attributes = [
        'status' => "active",
    ];
    protected $allowedFields = ['name',"identification","password"];
	protected $validationRules = [
		"name" => "required",
		"identification" => "required",
		"password" => "required"
	];
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function accounts(){
        return $this->hasMany(accountsModel::class,"customer_id");
    }
    
    public function registered_accounts(){
        return $this->hasMany(registeredAccountModel::class,"customer_id");
    }
}
