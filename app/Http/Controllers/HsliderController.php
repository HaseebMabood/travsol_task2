<?php

namespace App\Http\Controllers;

use App\Models\homeslider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HsliderController extends Controller
{
    public function index()
    {
        $sliders = homeslider::paginate(5);

        return view('admin.HomeSlider.Home_slider', compact('sliders'));
    }



    public function add_slider(Request $request)
    {

        $data = new homeslider();

        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('public/upload_images', $imagename);

            $data->image = $imagename;
            // dd('osho');

        }


        $data->status = $request->status;
        $data->sequence = $request->sequence;
        // dd($data);
        $data->save();


        return redirect('Home_slider')->with('success','Home slider added successfully!');
    }

    public function edit_slider($id)
    {
        $slider = homeslider::find($id);

        return view('admin.HomeSlider.update_slider', compact('slider'));
    }

    public function update_slider(Request $request, $id)
    {
        // dd($request);
        $content = homeslider::find($id);
        // ddd($user);

        $image = $request->image;

        // dd($image);
        if ($image) {
            $path = 'public/upload_images/' . $content->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->banner_image->move('public/upload_images', $imagename);

            $content->image = $imagename;
        }


        $content->status = $request->status;
        $content->sequence = $request->sequence;
        // dd($content);  //ok
        $content->update();
        return redirect('/Home_slider')->with('success','Home slider updated successfully!');
    }

    public function delete_slider($id)
    {
        $content = homeslider::find($id);
        $content->delete();
        return redirect('/Home_slider')->with('success','Home slider deleted successfully!');
    }
}