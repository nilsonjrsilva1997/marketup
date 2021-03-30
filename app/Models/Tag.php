<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_id'];

    protected $table = 'tags';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
