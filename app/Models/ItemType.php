<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class  ItemType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'item_types';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
