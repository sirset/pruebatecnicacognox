<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionsModel extends Model
{     
    use HasFactory;

    protected $table  = "transactions";
    protected $fillable = ["accountOrigin_id","accountDestination_id","money","code"];
    protected $allowedFields = ["accountOrigin_id","accountDestination_id","money","code"];
    protected $validationRules = [
		"accountOrigin_id" => "required",
		"accountDestination_id" => "required",
		"money" => "required",
        "code" => "required"
	];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
