<?php

namespace App\Http\Controllers\FrontEnd\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\FrontEnd\Country;
use Carbon\Carbon;
use DB;
use Auth;
use Session;

class CountryController extends Controller
{
    /**
     * Display a listing of the BestSeller Create On 01-02-2018
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        // $this->middleware('auth:account');
    }
        
    public function index(){	
        $country = Country::all();
        return response()->json(['data'=>$country,'success' => true, 'message' => 'Success', 'total' => count($country)]);
    }

}