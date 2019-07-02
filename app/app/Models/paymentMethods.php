<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paymentMethods extends Model
{
    protected $fillable = [
        'id', 'slug', 'name', 'invoice_restrict', 'order'
    ];

    public function Company(){
        return $this->hasMany('App\Models\Company', 'default_payment_method_id', 'id');
    }
}
