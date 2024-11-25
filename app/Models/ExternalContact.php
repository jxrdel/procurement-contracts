<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalContact extends Model
{
    use HasFactory;

    protected $table = 'external_contacts';

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'note',
        'phone1',
        'phone2',
        'is_active',
        'external_company_id',
        'created_by',
        'updated_by',
    ];

    public function company()
    {
        return $this->belongsTo(ExternalCompany::class, 'external_company_id');
    }
}
