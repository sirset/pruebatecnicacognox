<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registeredAccountModel extends Model
{
    use HasFactory;

    protected $table = "registered_accounts";

    protected $allowedFields = ["id_customer","id_account"];
    protected $validationRules = [
        "customer_id" => "required",
        "account_id" => "required"
    ];
    protected $createdField = "created_at";
    Protected $updateField = "update_at";
    protected $useTimestamps = true;
}
