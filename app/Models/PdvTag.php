<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PivotPdvTag;

class PdvTag extends Model
{
    use HasFactory;
    protected $table = 'pdv_tags';
    protected $fillable = ['name', ];

    public function pivot_pdv_tag()
    {
        return $this->hasMany(PivotPdvTag::class);
    }
}
