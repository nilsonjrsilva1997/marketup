<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\PivotStockSize;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'product_id'];

    protected $table = 'stocks';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function pivot_stock_sizes()
    {
        return $this->hasMany(PivotStockSize::class);
    }
}