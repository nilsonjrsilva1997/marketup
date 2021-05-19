<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class DestinationIncomeTax extends Model
{
    use HasFactory;
    protected $table = 'destination_income_taxes';
    protected $fillable = ['name'];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
