<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use App\Models\BalanceRequest;

class ShowBalanceReqController extends Controller
{
    public function index(){
        $data = BalanceRequest::all();
        return view('balanceRequest_admin.index',compact('data'));
    }
}