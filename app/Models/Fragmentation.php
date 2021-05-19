<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Fragmentation extends Model
{
    use HasFactory;
    protected $table = 'fragmentations';
    protected $fillable = ['quantity', 'product_id', 'unity_id', 'sale_value', ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function unity()
    {
        return $this->belongsTo(FragmentationUnity::class, 'unity_id', 'id');
    }
}
