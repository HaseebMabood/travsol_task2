<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $agencies = Agency::all();
        return view('agency.index',compact("agencies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = User::role('agency admin')->get();
        return view('agency.create',compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Agency();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->license_no = $request->license;
        $data->Location = $request->location;
        $data->Contact_no = $request->contact;
        $data->manager_id = $request->manager;
        // dd($data);
        $data->save();

        return redirect('/agencies')->with('success','Agency added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {

        // $selected_manager = Agency::where('manager_id',$agency->manager_id)->first();
        // // dd($selected_manager); //okk
        // $manag_id = $selected_manager->manager_id;
        // // dd($manag_id); //okk
        // $manager = User::where('id',$manag_id)->first();
        // // dd($manager);//okk
        // $manag_name = $manager->name;
        // dd($manag_name); //okk
        $managers = User::role('agency admin')->get();
        // return view('agency.update',compact('agency','managers','manag_name')); //no need
        return view('agency.update',compact('agency','managers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {

        $agency->name = $request->name;
        $agency->email = $request->email;
        $agency->license_no = $request->license;
        $agency->Location = $request->location;
        $agency->Contact_no = $request->contact;
        $agency->manager_id = $request->manager;
        $agency->update();

        return redirect('/agencies')->with('success','Agency updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();
        return redirect('/agencies')->with('success','Agency deleted successfully!');
    }
}