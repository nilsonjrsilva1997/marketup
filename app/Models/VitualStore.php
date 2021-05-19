<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitualStore extends Model
{
    use HasFactory;
    protected $table = 'vitual_stores';
    
    protected $fillable = [
        'product_name', 
        'price_of', 
        'price_per', 
        'menu_id', 
        'submenu_id', 
        'height', 
        'depth', 
        'width', 
        'weight', 
        'description', 
        'warranty', 
        'included_items', 
        'specification', 
        'featured_home', 
        'product_id'
    ];
}
