<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PivotStockSize;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    protected $table = 'sizes';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pivot_stock_sizes()
    {
        return $this->hasMany(PivotStockSize::class);
    }
}
