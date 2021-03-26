<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserUnity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'abbreviation', 'user_id'];

    protected $table = 'user_unities';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
