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
    ];

    public function contacts()
    {
        return $this->hasMany(ExternalContact::class);
    }
}
