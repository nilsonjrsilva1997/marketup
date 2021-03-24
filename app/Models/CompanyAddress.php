<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class CompanyAddress extends Model
{
    use HasFactory;

    protected $fillable = ['zip_code', 'road', 'number', 'complement', 'district'];

    protected $table = 'company_addresses';

    public function company()
    {
        return $this->hasOne(Comapny::class);
    }
}
