<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Composition;

class CompositionUnity extends Model
{
    use HasFactory;
    protected $table = 'composition_unities';
    protected $fillable = ['name', 'user_id', ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function composition()
    {
        return $this->hasMany(Composition::class);
    }
}
