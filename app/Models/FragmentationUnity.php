<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fragmentation;

class FragmentationUnity extends Model
{
    use HasFactory;
    protected $table = 'fragmentation_unities';
    protected $fillable = ['name'];

    public function fragmentation()
    {
        return $this->hasMany(Fragmentation::class);
    }
}
