<?php

namespace App\Http\Controllers;

use App\Models\assetype;
use App\Models\categorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class assetcategories extends Controller
{
    public function addcategories()
    {
        $sel = assetype::all();
        return view('admin.addcategories', compact('sel'));
    }
    public function addcat(Request $req)
    {
        $valid = $req->validate([
            'name' => 'required|min:3|max:30',
            'code' => 'required|min:16|max:16',
            'pro' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
        if ($valid) {
            $name = $req->name;
            $code = rand(1000000000000000, 9999999999999999);
            $product = $req->pro;
            $active = $req->active;
            $filename = "Image-" . time() . "." . $req->image->extension();
            if ($req->image->move(public_path('uploads'), $filename)) {
                $data = new categorie();
                $data->name = $name;
                $data->code = $code;
                $data->type_id = $product;
                $data->status = 1;
                $data->image = $filename;
                if ($data->save()) {
                    return back()->with("success", "your asset categories is store");
                } else {
                    return back()->with("error", "Data not addded.");
                }
            } else {
                return back()->with("success", "image not uploaded.");
            }
        }
    }
    public function showcategories()
    {
        $data = categorie::all();
        return view('admin.showcategories', compact('data'));
    }
    public function delete_cat($id)
    {
        $data = categorie::find($id)->delete();
        return redirect('showcategories');
    }
    public function editcategories($id)
    {
        $sel = assetype::all();
        $data = categorie::all()->where('id', $id)->first();
        return view('admin.editcategories', compact('sel', 'data'));
    }
    public function updatecat(Request $req)
    {
        $validateass = $req->validate([
            'name' => 'required',
            'pro' => 'required',
        ]);
        if ($validateass) {
            $data = categorie::where('id', $req->uid)->update([
                'name' => $req->name,
                'type_id' => $req->pro,
            ]);
        }
        return redirect('/showcategories');
    }
    //pie chart
    public function index()
    {
        $result = DB::select(DB::raw("select count(*)as total,name from categories group by name"));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .= "['" . $list->name . "',     " . $list->total . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");
        return view('admin.chart', $arr);
    }
    public function index1()
    {

       $result2 = DB::select(DB::raw("select status as total,count('status')as count from categories group by status"));
       $chartData = "";
        foreach ($result2 as $list) {
            $name = $list->total == 1 ? "Active" : "In-Active";
            $chartData .= "['" . $name . "',     " . $list->count . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");



        return view('admin.barchart', $arr);
    }
}
