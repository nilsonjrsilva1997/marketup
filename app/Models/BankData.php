<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bank;

class BankData extends Model
{
    use HasFactory;
    protected $table = 'bank_datas';

    protected $fillable = [
        'bank_id',
        'agency',
        'agency_digit',
        'account',
        'account_digit',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'bank_id', 'id');
    }
}
