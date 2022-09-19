<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Balance_Credit;
use Illuminate\Http\Request;
use App\Models\CreditRequest;
use Illuminate\Support\Facades\Auth;

class CreditReqController extends Controller
{
    public function credit_req(){
        $agency = Agency::where('manager_id',Auth::id())->first();
        // dd($agency);
        return view('creditRequest.index',compact('agency'));
    }

    public function credit_req_sent(Request $request){
        $data = new CreditRequest();

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
        $data->credit_req_type = $request->req_type;
        $data->agency_id = $request->agency_id;
        $data->agency_name = $request->agency_name;
        $data->admin_id = Auth::id();
        $data->admin_name = Auth::user()->name;
        $data->save();
        return redirect()->back()->with('success','Request sent successfully!');
    }



    // Approve and disapprove credit request

    public function add_credit($id)
    {

        $data = CreditRequest::find($id);
        $d = Agency::where('id', $data->agency_id)->first();
        // dd($data->status); //okk
        // dd($d);
        // dd($data);//okk
        // dd($data->req_amount); //okk
        if($data->credit_req_type=='add'){

            $deposit = $d->credit_limit + $data->req_amount;
            // dd($deposit); //jur shee
            $d->credit_limit = $deposit;
            $d->update();

     //now updating status to 1

           $data->status = '1';
            $data->update();
            // dd($data); //okk

            return redirect()->back()->with('success','Credit added successfully!');
        }
        else if($data->credit_req_type=='subt'){
            $deposit = $d->credit_limit - $data->req_amount;
            // dd($deposit); //jur shee
            $d->credit_limit = $deposit;
            $d->update();

            //now updating status to 1

            $data->status = '1';
            $data->update();
           // dd($data); //okk
            return redirect()->back()->with('success','Credit subtracted successfully!');
        }
        // return redirect('/agencies')->with('success','Agency deleted successfully!');
    }


    // Reject balance request


    public function reject_credit_req($id)
    {

        $data = CreditRequest::find($id);

           $data->status = '2';
            $data->update();
            // dd($data); //okk

            return redirect()->back()->with('error','Balance request rejected!');

    }








    // merge balance and credit request


    // public function amount_req(){
    //     $agency = Agency::where('manager_id',Auth::id())->first();
    //     // dd($agency); //fetch all agency record to whom it is connected
    //     return view('balance_credit.index',compact('agency'));
    // }


    // public function amount_req_sent(Request $request){
    //     $data = new Balance_Credit();

    //     $d = Agency::where('manager_id',Auth::id())->first();
    //     // dd($d->amount); //okk

    //     if($request->req_type =='add'){
    //                 // dd('osho add');
    //                 $data->req_amount = $request->amount;
    //             }


    //     elseif($request->req_type =='subt'){
    //         if($request->amount < $d->credit_limit){
    //             // dd('osho sub');
    //             $data->req_amount = $request->amount;
    //         }
    //         else{
    //             return redirect()->back()->with('error','Credit amount range exceeded!');
    //         }

    //     }



    //     // $data->req_amount = $request->amount;
    //     $data->amount_type = $request->amount_type;
    //     $data->balance_req_type = $request->req_type;
    //     $data->agency_id = $request->agency_id;
    //     $data->agency_name = $request->agency_name;
    //     $data->admin_id = Auth::id();
    //     $data->admin_name = Auth::user()->name;
    //     $data->save();
    //     return redirect()->back()->with('success','Request sent successfully!');
    // }



}