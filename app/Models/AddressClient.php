<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class AddressClient extends Model
{
    use HasFactory;
    protected $table = 'address_clients';

    protected $fillable = [
        'zip_code',
        'road',
        'number',
        'complement',
        'district',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
