<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesteCrud extends Model
{
    use HasFactory;
    protected $table = 'teste_cruds';
    protected $fillable = ['integer_teste', 'string_teste', 'float_teste', ];
}
