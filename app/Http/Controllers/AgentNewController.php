<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AgentNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AgentNewController extends Controller
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
        //    $user_id = auth()->user()->id;
        // // dd($user_id);
        // $user = User::find($user_id);
        // // dd($user); //okk
        // $agents = $user->agents_table();
        // dd($agents);
        $agents = AgentNew::all();
        return view('agent.index',compact("agents"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new AgentNew();

        $image = $request->image;

        if ($image) {

            $imagename = time().'.'. $image->getClientOriginalExtension();

            $request->image->move('agents/upload_images', $imagename);

            $data->image = $imagename;
            // dd('osho');

        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->system_id = $request->system_id;
        $data->manager_id = Auth::user()->id;
        $data->phone = $request->phone;
        $data->save();

        return redirect('/agents_new')->with('success','Agent added successfully!');
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
        $agent = AgentNew::find($id);
        return view('agent.update',compact('agent'));
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
        $agent = AgentNew::find($id);
        $image = $request->image;
        if($image){
            $path = 'agents/upload_images/'.$agent->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $imagename = time().'.'. $image->getClientOriginalExtension();

            $request->image->move('agents/upload_images', $imagename);

            $agent->image = $imagename;

        }


        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->system_id = $request->system_id;
        $agent->manager_id = Auth::user()->id;
        $agent->phone = $request->phone;
        $agent->update();

        return redirect('/agents_new')->with('success','Agent updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent= AgentNew::find($id);
            
        if($agent->image){
            $path = 'agents/upload_images/'.$agent->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }

        $agent->delete();
        return redirect('/agents_new')->with('success','Agent deleted successfully!');
    }
}