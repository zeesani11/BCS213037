<?php

namespace App\Http\Controllers;
use App\Models\Resort;

use Illuminate\Http\Request;

class resortcontroller extends Controller
{

    public function usershow()
    {
        $resorts = Resort::get();
        return view('userresort', compact('resorts'));
    }
    
    public function orderResort(Request $request)
    {
        session()->flash('status', 'Resort ordered successfully!');
        return redirect()->route('user.resort');
    }



    public function index()
    {
        $resorts = Resort::get();
        return view('addresort',compact('resorts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg',
            'address' => 'required',
            'price' => 'required|numeric'
        ]);

        $path = $request->file('photo')->store('image', 'public');

        $resort = new Resort();
        $resort->file_name = $path;
        $resort->price = $request->price;
        $resort->address = $request->address;
        $resort->save();

        return redirect()->route('add.resort');
    }

   
    public function destroy(string $id)
    {
        $resort = Resort::find($id);

        $resort->delete();
        $resort_path = public_path("storage/").$resort->file_name;

        if(file_exists($resort_path))
        {
            @unlink($resort_path);
        }
        return redirect()->route('add.resort');
    }
}
