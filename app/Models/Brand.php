<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    protected $table = 'brands';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
