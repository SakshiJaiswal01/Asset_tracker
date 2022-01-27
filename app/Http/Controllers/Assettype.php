<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assetype;

class Assettype extends Controller
{
    public function addassets()
    {
        return view('admin.addassets');
    }
    public function addasset_insert(Request $req)
    {
        $valid = $req->validate([
            'type' => 'required|min:3|max:30|unique:assetypes',
            'description' => 'required|min:3|max:500',
        ]);
        if ($valid) {
            $data = new assetype();
            $data->type = $req->type;
            $data->description = $req->description;
            $data->save();
            return back()->with("success", "your asset type is store");
        } else {
            return back()->with("error", "some error is their");
        }
        return "add successfully.";
    }
    public function showassets()
    {
        $data = assetype::all();
        return view('admin.showassets', compact('data'));
    }
    public function editassets($id)
    {
        $data = assetype::all()->where('id', $id)->first();
        return view('admin.editassets', compact('data'));
    }
    public function update(Request $req)
    {
        $validateass = $req->validate([
            'type' => 'required',
            'description' => 'required',
        ]);
        if ($validateass) {
            $data = assetype::where('id', $req->pid)->update([
                'type' => $req->type,
                'description' => $req->description,
            ]);
        }
        return redirect('/showassets');
    }

    public function delete_asset($id)
    {
        $data = assetype::find($id)->delete();
        return redirect('showassets');
    }
}
