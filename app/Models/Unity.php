<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Unity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'abbreviation', 'user_id'];

    protected $table = 'unities';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
