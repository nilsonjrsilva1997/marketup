<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class  PivotStockSize extends Model
{
    use HasFactory;

    protected $fillable = ['stock_id', 'size_id'];

    protected $table = 'pivot_stock_sizes';

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }

    public function size()
    {
        $this->belongsTo(Size::class, 'size_id', 'id');
    }
}
