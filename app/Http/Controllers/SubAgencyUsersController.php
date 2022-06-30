<?php

namespace App\Http\Controllers;

use App\Models\SubAgency;
use Illuminate\Http\Request;
use App\Models\SubAgencyUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SubAgencyUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // We have used this method in SubAgencyController and the rest method are using below
        // $subagency = SubAgency::find($id);
        // $users = SubAgencyUser::all();
        // return view('subagencyusers.index',compact("subagency","users"));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subagency)
    {
        // problems in this method becaue we cannot pass id in this method so i used show method instead
        // dd($subagency);
        // return view('subagencyusers.create',compact("subagency"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new SubAgencyUser();

        //   dd($request->subagency_id);  //okk
        $image = $request->image;

        if ($image) {

            $imagename = time().'.'. $image->getClientOriginalExtension();

            $request->image->move('users/upload_images', $imagename);

            $data->image = $imagename;
          

        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->system_id = $request->system_id;
        $data->manager_id = Auth::user()->id;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->subagency_id = $request->subagency_id;
        $data->save();

        return redirect()->back()->with('success','Agency User added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//this method is working as like above one a create method bcoz that one is not do what i want. 
    {
        // dd($id);
        $subagency = SubAgency::find($id);
        // dd($subagency); //okk
        return view('subagencyusers.create',compact("subagency"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       

        $agency = SubAgencyUser::find($id);

        // $subagency = SubAgencyUser::where('id',$agency)->get();
        // dd($subagency);

        return view('subagencyusers.update',compact('agency'));
        
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
        $data = SubAgencyUser::find($id);

        //   dd($request->subagency_id);  //okk
        $image = $request->image;
        if($image){
            $path = 'users/upload_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $imagename = time().'.'. $image->getClientOriginalExtension();

            $request->image->move('users/upload_images', $imagename);

            $data->image = $imagename;

        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->system_id = $request->system_id;
        $data->manager_id = Auth::user()->id;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->subagency_id = $request->subagency_id;
        $data->update();

        return redirect()->back()->with('success','Agency User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = SubAgencyUser::find($id);
        
        if($agency->image){
            $path = 'users/upload_images/'.$agency->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }

        $agency->delete();
        return redirect()->back()->with('success','Agency User deleted successfully!');
    }
}