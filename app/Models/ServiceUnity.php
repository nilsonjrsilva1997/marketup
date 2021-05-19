<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class ServiceUnity extends Model
{
    use HasFactory;
    protected $table = 'service_unities';

    protected $fillable = [
        'initials', 
        'name', 
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
