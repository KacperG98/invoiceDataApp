<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class companyModulesHistory extends Model
{
    protected $table = 'company_modules_history';
    protected $fillable = [
        'id', 'company_id', 'module_id', 'package_id', 'transaction_id', 'old_value', 'new_value', 'start_date', 'expiration_date', 'status', 'price'
    ];

    public function Company()
    {
        $cmh = $this->belongsTo('App\Models\Company', 'company_id', 'id')->whereNotNull('payment')->orderBy('expiration_date', 'DESC')->latest();
        return $cmh->sortBy('expiration_date');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\payments', 'transaction_id', 'transaction_id');
    }

    public function Module()
    {
        return $this->belongsTo('App\Models\Modules');
    }

}
