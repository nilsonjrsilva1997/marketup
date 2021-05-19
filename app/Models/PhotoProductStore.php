<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoProductStore extends Model
{
    use HasFactory;
    protected $table = 'photo_product_stores';
    protected $fillable = ['image', 'virtual_store_id'];
}
