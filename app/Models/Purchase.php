<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';

    protected $fillable = [
        'name',
        'note',
        'is_active',
        'external_company_id',
        'created_by',
        'updated_by',
    ];

    public function company()
    {
        return $this->belongsTo(ExternalCompany::class, 'external_company_id');
    }

    public function contracts()
    {
        return $this->hasMany(PurchaseContract::class);
    }
}
