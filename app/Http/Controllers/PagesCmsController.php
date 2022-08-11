<?php

namespace App\Http\Controllers;

use App\Models\content_cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PagesCmsController extends Controller
{
    public function index()
    {
        $pages = content_cms::all();
        return view('admin.PageContent.pages_content', compact('pages'));
    }

    public function store_content(Request $request)
    {
        $data = new content_cms;
        $image = $request->banner_image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->banner_image->move('public/upload_images', $imagename);
            $data->image = $imagename;
            // dd($imagename);
        }
        // $data->image = $image;
        $data->name_cms = $request->name;
        $data->slug_cms = $request->slug;
        $data->meta_title = $request->meta_title;
        $data->meta_desc = $request->meta_desc;
        $data->details = $request->details;
        $data->banner_text = $request->banner_text;
        $data->status_cms = $request->status;
        $data->parent_id = $request->parent_id;
        $data->sequence = $request->sequence;
        // dd($data);
        $data->save();
        return redirect('pages_content')->with('success','Page content added successfully!');
    }

    public function edit_content($id)
    {
        $page = content_cms::find($id);

        return view('admin.PageContent.update_pages_content', compact('page'));
    }

    public function update_content(Request $request, $id)
    {
        // dd($request);
        $content = content_cms::find($id);
        // ddd($user);

        $image = $request->banner_image;
        if ($image) {
            $path = 'public/upload_images/' . $content->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->banner_image->move('public/upload_images', $imagename);

            $content->image = $imagename;
        }


        $content->name_cms = $request->name;
        $content->slug_cms = $request->slug;
        $content->meta_title = $request->meta_title;
        $content->meta_desc = $request->meta_desc;
        $content->details = $request->details;
        $content->banner_text = $request->banner_text;
        $content->status_cms = $request->status;
        $content->parent_id = $request->parent_id;
        $content->sequence = $request->sequence;
        // dd($content);  //ok
        $content->update();
        return redirect('/pages_content')->with('success','Page content updated successfully!');
    }

    public function delete_content($id)
    {
        $content = content_cms::find($id);

        $content->delete();
        return redirect('/pages_content')->with('success','Page content deleted successfully!');
    }
}