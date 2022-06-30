<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    

    public function my_profile(){
        
        return view('admin.profile');
    }




    public function update_profile(Request $request,$id)
    {
        $user = User::find($id);

        
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
            $user->password = Hash::make($request->password);
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            // dd('osho');  //ok
            $user->update();
            return redirect('/users');

    }
}