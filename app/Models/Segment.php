<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Segment extends Model
{
    use HasFactory;

    protected $fillable = ['icon', 'name', 'background_image'];

    protected $table = 'segments';

    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
