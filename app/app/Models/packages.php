<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class packages extends Model
{
    protected $fillable = [
        'id', 'slug', 'name', 'default', 'portal_name'
    ];

    public function CompanyModules()
    {;
        return $this->belongsToMany('App\Models\companyModules', 'package_id', 'id');
    }
}
