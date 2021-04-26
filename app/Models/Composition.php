<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompositionUnity;
use App\Models\Product;

class Composition extends Model
{
    use HasFactory;
    protected $table = 'compositions';
    protected $fillable = ['item', 'quantity', 'unity_id', 'unit_cost', 'total_cost', 'product_id', ];

    public function unity()
    {
        return $this->belongsTo(CompositionUnity::class, 'unity_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
