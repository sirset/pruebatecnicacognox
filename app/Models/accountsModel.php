<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accountsModel extends Model
{
    use HasFactory;
    protected $table = "accounts";

    protected $attributes = [
        "status"=>"active"
    ];
    protected $allowedFields = ['account',"money","id_customer"];
    protected $validationRules = [
		"account" => "required",
		"money" => "required",
		"id_customer" => "required"
	];
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
