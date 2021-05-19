<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Historic extends Model
{
    use HasFactory;
    protected $table = 'historics';

    protected $fillable = [
        'date', 
        'description', 
        'status', 
        'client_id', 
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
