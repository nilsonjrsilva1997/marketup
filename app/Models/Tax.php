<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Origin;
use App\Models\TaxType;
use App\Models\Product;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = ['ncm', 'cest', 'tax_type_id', 'origin_id'];

    protected $table = 'taxes';

    public function origin()
    {
        return $this->belongsTo(Origin::class, 'origin_id', 'id');
    }

    public function tax_type()
    {
        return $this->belongsTo(TaxType::class, 'tax_type_id', 'id');
    }
}
