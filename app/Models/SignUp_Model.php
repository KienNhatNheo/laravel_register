<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignUp_Model extends Model
{
    use HasFactory;
    protected $table='table_users';
    protected $fillable = ['username','password'];
}