<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PdvCategory;
use App\Models\Product;
use App\Models\PivotPdvTag;

class Pdv extends Model
{
    use HasFactory;
    protected $table = 'pdvs';
    protected $fillable = ['category_id', 'label', 'product_id', ];

    public function category()
    {
        return $this->belongsTo(PdvCategory::class, 'category_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function pivot_pdv_tag()
    {
        return $this->hasMany(PivotPdvTag::class);
    }
}
