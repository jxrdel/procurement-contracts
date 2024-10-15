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
        'details',
        'phone1',
        'phone2',
        'external_company_id',
    ];
}
