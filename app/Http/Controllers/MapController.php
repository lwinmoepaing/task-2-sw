<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class MapController extends Controller
{

    public function createMap(Request $request)
    {
        $this->validate($request, [
            // 'id' => 'required|string',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->image){
            try {
                $newMap = new Map();
                $filePath = $this->mapImageUpload($request->image); //Passing $data->image as parameter to our created method
                $newMap->url = $filePath;
                $newMap->user_id = Auth::id();
                $newMap->save();
                return redirect()->back()->with('success' , 'Complely Create New Map');
            } catch (Exception $e) {
                //Write your error message here
                dd($e);
                return redirect()->back()->with('error', 'Cant Upate Image');
            }
        }
    }

    public function updateMap(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|string',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $newMap = Map::whereId($request->id)->update($request->all());
            $filePath = $this->mapImageUpload($request->image); //Passing $data->image as parameter to our created method
            $newMap->url = $filePath;
            $newMap->save();
            return redirect()->back()->with('success' , 'Complely Update New Map');
        } catch (Exception $e) {
            //Write your error message here
            dd($e);
            return redirect()->back()->with('error', 'Cant Upate Image');
        }
    }

    public function mapImageUpload($query) // Taking input image as parameter
    {
        $image_name = Str::random(30);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'image/maps/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path . $image_full_name;
        $success = $query->move($upload_path, $image_full_name);

        return $image_url; // Just return image
    }
}
