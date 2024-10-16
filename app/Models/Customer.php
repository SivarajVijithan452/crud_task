<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Define the table if it's not the plural form of the model name
    protected $table = 'customers';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'image',
    ];

}
