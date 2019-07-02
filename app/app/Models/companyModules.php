<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class companyModules extends Model
{
    protected $fillable = [
        'id', 'company_id', 'module_id', 'package_id', 'subscription_id', 'expiration_date', 'value'
    ];

    public $primaryKey = 'id';

    public function Company()
    {
        return $this->belongsTo('App\Models\Company' , 'company_id', 'id');//->orderBy('expiration_date', 'ASC');     OPTYMALIZACJA
    }

    public function Packages()
    {
        return $this->hasOne('App\Models\packages', 'id', 'package_id');
    }

    public function Module()
    {
        return $this->belongsTo('App\Models\Modules');
    }
}
