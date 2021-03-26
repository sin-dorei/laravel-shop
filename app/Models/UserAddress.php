<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    protected $fillable = [
        'province',
        'city',
        'district',
        'address',
        'zipcode',
        'contact_name',
        'contact_phone',
        'last_used_at',
    ];

    protected $dates = ['last_used_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFullAddressAttribute(): string
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }
}
