<?php

namespace App\Http\Controllers;

use App\Models\AgentNew;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:create user', ['only' => ['create','store']]);
        $this->middleware('permission:action', ['only' => ['edit','update']]);
        $this->middleware('permission:action', ['only' => ['destroy']]);
        
    }



    public function index()
    {
        $users=User::all();
        return view('admin.users_table',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new User();

        $image = $request->image;

        if ($image) {

            $imagename = time().'.'. $image->getClientOriginalExtension();

            $request->image->move('public/upload_images', $imagename);

            $data->image = $imagename;
            // dd('osho');

        }


        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect('/users');

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
    public function edit(User $user)
    {
        return view('admin.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $image = $request->image;
        if($image){
            $path = 'public/upload_images/'.$user->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $imagename = time().'.'. $image->getClientOriginalExtension();

            $request->image->move('public/upload_images', $imagename);

            $user->image = $imagename;

        }


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->update();

         return redirect('/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }

    public function agents_all()
    {
        $agents_all = AgentNew::all();
        // dd($agents_all);
        return view('agents_all_showTo_admin.index',compact('agents_all'));
    }
}