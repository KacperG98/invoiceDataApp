<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\paymentMethods;

class Company extends Model
{
    protected $fillable = [
        'id', 'name', 'country_vatin_prefix_id', 'vatin', 'vat_payer','vat_release_reason_id', 'vat_release_reason_note', 'email', 'website', 'phone', 'main_address_street', 'main_address_number', 'main_address_zip_code', 'main_address_city', 'main_address_country', 'contact_address_street', 'contact_address_number', 'contact_address_zip_code', 'contact_address_city', 'contact_address_country'
    ];

    protected $appends = ['module_expiration_date', 'expiration_date'];

    public $primaryKey = 'id';

    public function companyModules()
    {
        return $this->hasMany('App\Models\companyModules', 'company_id', 'id');//->orderBy('expiration_date', 'asc');     OPTYMALIZACJA
    }

    public function companyModulesHistory()
    {
        return $this->hasMany('App\Models\companyModulesHistory', 'company_id', 'id')->orderBy('expiration_date', 'asc');
    }
    
    public function getExpirationDateAttribute()
    {
        $module = $this->companyModules()->whereNotNull('expiration_date')/*->orderBy('expiration_date', 'asc')*/->first();  // OPTYMALIZACJA 
        return $module ? $module->expiration_date : ' '; //'null';
    }

    public function getModuleExpirationDateAttribute()
    {
        $HistoryModuleDate = $this->companyModulesHistory()->whereNotNull('expiration_date')->orderBy('expiration_date', 'desc')->latest()->first();
        
        //$HistoryModuleDate = $HistoryModuleDate->sortByDesc(expiration_date);

        return $HistoryModuleDate ? $HistoryModuleDate->expiration_date : null;
    }
}
