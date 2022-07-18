<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditRequest;

class ShowCreditReqController extends Controller
{
    public function credit_index(){
        $data = CreditRequest::all();
        return view('creditRequest_admin.index',compact('data'));
    }
}