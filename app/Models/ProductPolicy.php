<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_policy',
        'shipping_policy',
        'return_policy'
    ];
}
