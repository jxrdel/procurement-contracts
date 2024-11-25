<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'display_date',
        'is_custom_notification',
        'message',
        'purchase_contract_id',
        'created_by',
        'updated_by',
    ];

    public function purchaseContract()
    {
        return $this->belongsTo(PurchaseContract::class);
    }

    public function  notifiedUsers()
    {
        return $this->belongsToMany(User::class, 'user_notifications');
    }
}
