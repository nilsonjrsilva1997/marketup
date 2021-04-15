<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Pdv extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'pdv_category_id', 'label'];

    protected $table = 'pdvs';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
