<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tax;

class TaxType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'tax_types';

    public function tax()
    {
        return $this->hasOne(Tax::class);
    }
}
