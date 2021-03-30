<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['cost', 'retail_sale', 'wholesale', 'min_qt_wholesale', 'product_id'];

    protected $table = 'prices';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
