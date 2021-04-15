<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdvTag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'pdv_id'];

    protected $table = 'pdv_tags';
}
