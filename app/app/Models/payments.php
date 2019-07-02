<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $fillable = [
        'id', 'transaction_id', 'subscription_id', 'price_total', 'currency', 'vat', 'external_order_id', 'status', 'type', 'days', 'expiration_date'
    ];

    public function companyModulesHistory()
    {
        $cMH = $this->belongsTo('App\Models\companyModulesHistory', 'transaction_id', 'transaction_id')->sortBy('created_at')->latest();
        return $cMH->orderBy('price_total', 'asc');
    }
    
}
