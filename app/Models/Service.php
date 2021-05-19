<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceUnity;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $fillable = [
        'active_service', 
        'name', 
        'cost', 
        'value', 
        'unity_id', 
    ];

    public function unity()
    {
        return $this->belongsTo(ServiceUnity::class, 'unity_id', 'id');
    }
}
