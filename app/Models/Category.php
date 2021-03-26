<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    protected $table = 'categories';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
