<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Balance_Credit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmountReqController extends Controller
{
    
    public function amount_req(){
        $agency = Agency::where('manager_id',Auth::id())->first();
        // dd($agency); //fetch all agency record to whom it is connected
        return view('balance_credit.index',compact('agency'));
    }


    public function amount_req_sent(Request $request){
        $data = new Balance_Credit();

        $d = Agency::where('manager_id',Auth::id())->first();
        // dd($d->amount); //okk

        if($request->req_type =='add'){
                    // dd('osho add');
                    $data->req_amount = $request->amount;
                }


        elseif($request->req_type =='subt'){
            if($request->amount < $d->credit_limit){
                // dd('osho sub');
                $data->req_amount = $request->amount;
            }
            else{
                return redirect()->back()->with('error','Credit amount range exceeded!');
            }

        }



        // $data->req_amount = $request->amount;
        $data->amount_type = $request->amount_type;
        $data->balance_req_type = $request->req_type;
        $data->agency_id = $request->agency_id;
        $data->agency_name = $request->agency_name;
        $data->admin_id = Auth::id();
        $data->admin_name = Auth::user()->name;
        $data->save();
        return redirect()->back()->with('success','Request sent successfully!');
    }
}