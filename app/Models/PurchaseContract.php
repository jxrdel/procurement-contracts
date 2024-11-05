<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'file_number',
        'file_name',
        'start_date',
        'end_date',
        'note',
        'cost',
        'is_continuous',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function assignedTo()
    {
        return $this->belongsToMany(User::class, 'user_purchasecontracts', 'purchase_contract_id', 'user_id');
    }
}
