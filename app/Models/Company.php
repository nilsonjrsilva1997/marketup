<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyAddress;
use App\Models\User;
use App\Models\Segment;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['cnpj', 'telephone', 'company_address_id', 'user_id', 'segment_id'];

    protected $table = 'companies';

    public function company_address()
    {
        return $this->belongsTo(CompanyAddress::class, 'company_address_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class, 'segment_id', 'id');
    }
}
