<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\SubAgency;
use Illuminate\Http\Request;
use App\Models\SubAgencyUser;
use Illuminate\Support\Facades\Auth;

class SubAgencyController extends Controller
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
        // $subagencies = SubAgency::all();
        $manager_login = Auth::user()->id;
        $subagencies = SubAgency::where('manager_id',$manager_login)->get();
        // dd($subagencies);
        return view('subagency.index',compact("subagencies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manager_login = Auth::user()->id;
        $parent_agency = Agency::where('manager_id',$manager_login)->first();
        // dd($parent_agency);//ok
        $parent_agency_id = $parent_agency->id;
        // dd($parent_agency_id); //ok
        return view('subagency.create',compact('parent_agency_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new SubAgency();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->license_no = $request->license;
        $data->location = $request->location;
        $data->contact_no = $request->contact;
        $data->parent_agency_id = $request->p_agency_id;
        $data->manager_id =  Auth::id();
        // dd($data);
        $data->save();

        return redirect('/subagency')->with('success','Agency added successfully!');
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
    public function edit($id)
    {
        $agency = SubAgency::find($id);
        return view('subagency.update',compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agency = SubAgency::find($id);
        $agency->name = $request->name;
        $agency->email = $request->email;
        $agency->license_no = $request->license;
        $agency->location = $request->location;
        $agency->contact_no = $request->contact;
        // $agency->manager_id =  Auth::id();
        $agency->update();

        return redirect('/subagency')->with('success','Agency updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = SubAgency::find($id);
        $agency->delete();
        return redirect('/subagency')->with('success','Agency deleted successfully!');
    }




    // Sub agency respective users methods start

    public function userindex($id)
    {
        $subagency = SubAgency::where('id',$id)->first();
        $users = SubAgencyUser::where('subagency_id',$id)->get();
        // dd($subagency); //ok
        return view('subagencyusers.index',compact("subagency","users"));
        
    }

    // public function usercreate($id2)
    // {
    //     dd($id2);
    //     return view('subagencyusers.create',compact("subagency"));
    // }
}