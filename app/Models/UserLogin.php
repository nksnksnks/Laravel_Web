<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    public $timestamps = false;
    protected $fillable = ['customer_name', 'customer_phonenumber', 'customer_username', 'customer_email', 'customer_password'];
    protected $primaryKey = 'customer_id';
    protected $table = 'tbl_customers';
}
