<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pdv;
use App\Models\PdvTag;

class PivotPdvTag extends Model
{
    use HasFactory;
    protected $table = 'pivot_pdv_tags';
    protected $fillable = ['pdv_id', 'tag_id', ];

    public function pdv()
    {
        return $this->belongsTo(Pdv::class, 'pdv_id', 'id');
    }

    public function tag()
    {
        return $this->belongsTo(PdvTag::class, 'tag_id', 'id');
    }
}
