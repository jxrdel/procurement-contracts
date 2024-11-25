<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'uploaded_by',
        'purchase_contract_id',
    ];

    public function purchaseContract()
    {
        return $this->belongsTo(PurchaseContract::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($fileUpload) {
            if ($fileUpload->file_path && Storage::exists($fileUpload->file_path)) {
                Storage::delete($fileUpload->file_path);
            }
        });
    }
}
