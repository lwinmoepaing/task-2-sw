<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use App\Traits\ImageUpload;

class MapController extends Controller
{
    use ImageUpload;

    public function createMap(Request $request)
    {
        $this->validate($request, [
            // 'id' => 'required|string',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $newMap = new Map();
        if($request->image){
           try {
                $filePath = $this->mapImageUpload($request->image); //Passing $data->image as parameter to our created method
                $newMap->image = $filePath;
                $newMap->save();
                return redirect()->back()->with('success' , 'Complely Create New Map');
            } catch (Exception $e) {
                //Write your error message here
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
            $newMap->image = $filePath;
            $newMap->save();
            return redirect()->back()->with('success' , 'Complely Update New Map');
        } catch (Exception $e) {
            //Write your error message here
            return redirect()->back()->with('error', 'Cant Upate Image');
        }
    }
}
