<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AddressClient;
use App\Models\Contact;
use App\Models\DestinationIncomeTax;
use App\Models\BankData;
use App\Models\Document;
use App\Models\Historic;
use App\Models\TaxData;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';

    protected $fillable = [
        'name', 
        'cpf_cnpj', 
        'rg_ie', 
        'email', 
        'phone',
        'type',
        'surname',
        'rg_emitter',
        'rg_uf',
        'gender',
        'birthday',
        'cellphone',
        'site',
        'observation',
        'credit_limit',
        'company_name',
        'fantasy_name',
        'state_registration',
        'municipal_registration',
        'destination_IE_tax_id'
    ];

    public function addresses()
    {
        return $this->hasMany(AddressClient::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function destination_ie_tax()
    {
        return $this->belongsTo(DestinationIncomeTax::class, 'destination_IE_tax_id', 'id');
    }

    public function bank_data()
    {
        return $this->hasMany(BankData::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function historic()
    {
        return $this->hasMany(Historic::class);
    }

    public function tax_data()
    {
        return $this->hasOne(TaxData::class);
    }
}
