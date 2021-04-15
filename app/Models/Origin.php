<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tax;

class  Origin extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'index'];

    protected $table = 'origins';

    public function tax()
    {
        return $this->hasOne(Tax::class);
    }

}
