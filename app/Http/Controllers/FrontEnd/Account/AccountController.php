<?php

    namespace App\Http\Controllers\FrontEnd\Account;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Http\Models\FrontEnd\Account\Address;
    use App\Http\Models\FrontEnd\Account\Customer;
    use Carbon\Carbon;
    use DB;
    use Auth;
    use Session;

    class AccountController extends Controller
    {
        /**
         * Display a listing of the BestSeller Create On 01-02-2018
         *
         * @return \Illuminate\Http\Response
         */

        public function __construct(){
            //$this->middleware('auth:account');
            // $this->middleware('auth:customer', ['except' => ['logout']]);
        }

        public function customer(){
            return view('frontend.index');
        }

        public function getCustomer(){
            $CustomerInfo = Customer::where('sec_user_id',Auth::user()->id)->first();
            //dd($CustomerInfo);
            $AddressInfo = Address::where('address_id',$CustomerInfo->address_id)->first();
            $data = array(
                'customer_id' => $CustomerInfo->customer_id,
                'firstname' => $CustomerInfo->firstname,
                'lastname' => $CustomerInfo->lastname,
                'email' => $CustomerInfo->email,
                'telephone' => $CustomerInfo->telephone,
                'fax' => $CustomerInfo->fax,
                'address_1'=>$AddressInfo->address_1,
                'address_2'=>$AddressInfo->address_2,
                'city'=>$AddressInfo->city,
                'postcode'=>$AddressInfo->postcode,
                'company'=>$AddressInfo->company,
                'country_id'=>$AddressInfo->country_id,
                'zone_id'=>$AddressInfo->zone_id,
            );
            return response()->json(['data'=>$data,'success' => true, 'message' => 'Success', 'lang'=>Session::get('applangId')]);
        }
        
        public function show($id){

        }

        public function edit($id){

        }

        public function update(Request $request, $id){
            $data = $request->all();
            $customer = Customer::where('customer_id',$id);
            $customer->update([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'fax' => $data['fax'],          
                'code' => $data['code']
            ]);
            return response()->json(['success' => true, 'message' => 'Data has been updated.']);
        }

        public function index(){
            
            return response()->json(['data'=>$products,'success' => true, 'message' => 'Success', 'lang'=>Session::get('applangId')]);

        }

    }