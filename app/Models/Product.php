<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemType;
use App\Models\Unity;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\User;
use App\Models\Tag;
use App\Models\Price;
use App\Models\Stock;
use App\Models\Tax;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['bar_code', 'status', 'description', 'item_type_id', 'unity_id', 'category_id',
        'subcategory_id', 'balance_code', 'brand_id', 'model', 'internal_code', 'photo', 'user_id', 'tax_id'];

    protected $table = 'products';

    public function item_type()
    {
        return $this->belongsTo(ItemType::class, 'item_type_id', 'id');
    }

    public function unity()
    {
        return $this->belongsTo(Unity::class, 'unity_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class, 'tax_id', 'id');
    }
}
