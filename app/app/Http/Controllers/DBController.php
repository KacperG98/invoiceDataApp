<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\paymentMethods;
use App\Http\Requests;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class DBController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function grtIndex()
    {
        return view('test');
    }
    public function getData()
    {
        $Companies = Company::with('companyModules', 'companyModulesHistory', 'companyModulesHistory.payment', 'companyModules.packages')->get();

        if (isset($_REQUEST['order']) && $_REQUEST['order'][0]['column'] === '5') {  // OPTYMALIZACJA
            if ($_REQUEST['order'][0]['dir'] === 'asc') {
                $Companies = $Companies->sortBy(function($company) {
                    return $company->expiration_date;
                });
            } else {
                $Companies = $Companies->sortByDesc(function($company) {
                    return $company->expiration_date;
                });
            }
        }
        return Datatables::of($Companies)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="details/'.$row->id.'" class="edit btn btn-primary btn-sm">View</a>';
                $btn.= '<script>console.log('.$row.')</script>';
                return $btn;
            })
            // ->addColumn('expiration_date', function($row) {
            //     $date = null;
            //     foreach($row->companyModulesHistory as $moduleHistory) {
            //         if ($moduleHistory->expiration_date) {
            //             $expirationDate = Carbon::createFromFormat('Y-m-d H:i:s', $moduleHistory->expiration_date);
            //             if (!$date) {
            //                 $date = Carbon::createFromFormat('Y-m-d H:i:s', $moduleHistory->expiration_date);
            //             } elseif ($expirationDate->greaterThan($date)) {
            //                 $date = $expirationDate;
            //             }
            //         }
            //     }
            //     return $date;
            // })
            ->addColumn('transaction_id', function($row) {
                $date = null;
                $paymentId = null;
                foreach($row->companyModulesHistory as $moduleHistory) {
                    if ($moduleHistory->expiration_date) {
                        $expirationDate = Carbon::createFromFormat('Y-m-d H:i:s', $moduleHistory->expiration_date);
                        if (!$date) {
                            $date = Carbon::createFromFormat('Y-m-d H:i:s', $moduleHistory->expiration_date);
                            $paymentId = $moduleHistory->payment ? $moduleHistory->payment->id : null;
                        } elseif ($expirationDate->greaterThan($date)) {
                            $date = $expirationDate;
                            $paymentId = $moduleHistory->payment ? $moduleHistory->payment->id : null;
                        }
                    }
                }
                return $paymentId;
            })
            ->addColumn('total_price', function($row) {
                $date = null;
                $priceTotal = null;
                foreach($row->companyModulesHistory as $moduleHistory) {
                    if ($moduleHistory->expiration_date) {
                        $expirationDate = Carbon::createFromFormat('Y-m-d H:i:s', $moduleHistory->expiration_date);
                        if (!$date) {
                            $date = Carbon::createFromFormat('Y-m-d H:i:s', $moduleHistory->expiration_date);
                            $priceTotal = $moduleHistory->payment ? $moduleHistory->payment->price_total : null;
                        } elseif ($expirationDate->greaterThan($date)) {
                            $date = $expirationDate;
                            $priceTotal = $moduleHistory->payment ? $moduleHistory->payment->price_total : null;
                        }
                    }
                }
                return $priceTotal/100;
            })
            ->addColumn('new_package', function($row) {
                $package = $row->companyModules[0]->packages->name;
                return $package;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index()
    {     
        
        return view('showData');
    }

    public function show($id)
    {
        $companiesDetails = Company::with('companyModules', 'companyModulesHistory', 'companyModules.Module', 'companyModulesHistory.Module')->find($id);
        return view('details', compact('companiesDetails'));
    }
}
