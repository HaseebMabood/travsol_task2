<?php

namespace App\Http\Controllers;

use App\Models\markup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\React;

class MarkupController extends Controller
{

    public function index()
    {
        $markups = markup::all();
        return view('admin.MarkUp.markups', compact('markups'));
    }

    public function store_markup(Request $request)
    {
        $data = new markup();

        $data->userId = $request->pre_userId;
        $data->name = $request->pre_name;
        $data->supplier = $request->pre_supplier;
        $data->status = $request->pre_status;
        $data->priority = $request->pre_priority;
        $data->markup_by = $request->pre_markup_by;
        $data->markup_on = $request->pre_markup_on;
        $data->markup_val = $request->pre_markup_val;
        $data->markup_type = $request->pre_markup_type;
        // dd($request->pax_types);
        $data->pax_types =   implode(',', $request->pax_types);
        // dd($data->pax_types);
        // dd(explode(',', $data->pax_types));
        $data->origins = $request->pre_origins;
        $data->destinations = $request->pre_destinations;
        $data->carriers = $request->pre_carriers;
        $data->classes = $request->pre_classes;
        $data->trip_type = $request->pre_trip_type;
        $data->save();
        return redirect('markups')->with('success','Markup added successfully!');
    }

    public function edit_markup($id)
    {
        $markup = markup::find($id);
        return view('admin.MarkUp.edit_markup', compact('markup'));
    }

    public function update_markup(Request $request, $id)
    {
        // dd($request);
        $data = markup::find($id);

        $data->userId = '11';
        $data->name = $request->pre_name;
        $data->supplier = $request->pre_supplier;
        $data->status = $request->pre_status;
        $data->priority = $request->pre_priority;
        $data->markup_by = $request->pre_markup_by;
        $data->markup_on = $request->pre_markup_on;
        $data->markup_val = $request->pre_markup_val;
        $data->markup_type = $request->pre_markup_type;
        $data->pax_types =   implode(',', $request->pax_types);
        $data->origins = $request->pre_origins;
        $data->destinations = $request->pre_destinations;
        $data->carriers = $request->pre_carriers;
        $data->classes = $request->pre_classes;
        $data->trip_type = $request->pre_trip_type;
        $data->update();
        return redirect('markups')->with('success','Markup updated successfully!');
    }

    public function delete_markup($id)
    {
        $data = markup::find($id);
        $data->delete();
        return redirect('markups')->with('success','Markup deleted successfully!');
    }
}