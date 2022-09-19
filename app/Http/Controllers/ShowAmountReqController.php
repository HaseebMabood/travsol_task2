<?php

namespace App\Http\Controllers;

use App\Models\Balance_Credit;
use Illuminate\Http\Request;

class ShowAmountReqController extends Controller
{
    public function amount_requests(){
        $data = Balance_Credit::all();
        return view('amountRequest_admin.index',compact('data'));
    }
}