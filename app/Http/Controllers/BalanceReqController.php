<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\BalanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceReqController extends Controller
{
    public function balance_req(){
        $agency = Agency::where('manager_id',Auth::id())->first();
        // dd($agency);
        return view('balanceRequest.index',compact('agency'));
    }


    public function balance_req_sent(Request $request){
        $data = new BalanceRequest();
        $d = Agency::where('manager_id',Auth::id())->first();
        // dd($d->amount); //okk

        if($request->req_type =='add'){
                    // dd('osho add');
                    $data->req_amount = $request->amount;
                }


        elseif($request->req_type =='subt'){
            if($request->amount < $d->amount){
                // dd('osho sub');
                $data->req_amount = $request->amount;
            }
            else{
                return redirect()->back()->with('error','Amount range exceeded!');
            }
            
        }


        // elseif($request->amount > $d->amount){
        //     if($request->req_type =='add'){
        //         dd('osho add');
        //         $data->req_amount = $request->amount;
        //     }
          
        // }


        // else{
        //     return redirect()->back()->with('error','Amount range exceeded!');
        // }
        
    
        $data->balance_req_type = $request->req_type;
        $data->agency_id = $request->agency_id;
        $data->agency_name = $request->agency_name;
        $data->admin_id = Auth::id();
        $data->admin_name = Auth::user()->name;
        $data->save();
        return redirect()->back()->with('success','Request sent successfully!'); 
    }
}