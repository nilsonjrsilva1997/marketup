<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pdv;

class PdvCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    protected $table = 'pdv_categories';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pdv()
    {
        return $this->hasMany(Pdv::class);
    }
}
