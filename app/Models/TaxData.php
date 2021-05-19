<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class TaxData extends Model
{
    use HasFactory;
    protected $table = 'tax_datas';

    protected $fillable = [
        'email_nfe', 
        'iss_withholding_tax', 
        'final_costumer', 
        'rural_producer', 
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
