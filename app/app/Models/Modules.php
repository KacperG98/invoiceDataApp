<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $filable = [
        'id', 'name', 'slug', 'description', 'visible', 'available'
    ];
    public function CompanyModules()
    {
        return $this->hasOne('App\Models\companyModules');
    }
    public function CompanyModulesHistory()
    {
        return $this->hasOne('App\Models\companyModulesHistory');
    }
}
