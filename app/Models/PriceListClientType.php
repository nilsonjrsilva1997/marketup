<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceListClientType extends Model
{
    use HasFactory;
    protected $table = 'price_list_client_types';

    protected $fillable = [
        'description',
        'discount_retail', 
        'discount_wholesale'
    ];
}
