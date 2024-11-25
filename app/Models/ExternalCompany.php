<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalCompany extends Model
{
    use HasFactory;

    protected $table = 'external_companies';

    protected $fillable = [
        'name',
        'is_active',
        'details',
        'address1',
        'address2',
        'phone1',
        'phone2',
        'email',
        'created_by',
        'updated_by',
    ];

    public function contacts()
    {
        return $this->hasMany(ExternalContact::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function contracts()
    {
        return $this->hasManyThrough(
            PurchaseContract::class,
            Purchase::class,
            'external_company_id', // Foreign key on purchases table
            'purchase_id',         // Foreign key on purchase_contracts table
            'id',                  // Local key on external_companies table
            'id'                   // Local key on purchases table
        );
    }
}
