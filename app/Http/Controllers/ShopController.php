<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    //
    public function createNewShop(Request $request)
    {
        $this->validate($request, [
            "map_position_x" => "required",
            "map_position_y" => "required",
            "shop_name" => "required|min:1",
            "shop_address" => "string",
            "map_id" => "required"
        ]);

        try {
            $newShop = new Shop();
            $newShop->shop_name = $request->shop_name;
            $newShop->shop_address = $request->shop_address;
            $newShop->map_position_x = $request->map_position_x;
            $newShop->map_position_y = $request->map_position_y;
            $newShop->map_id = $request->map_id;
            $newShop->user_id = Auth::id();
            $newShop->save();
            return redirect()->back()->with('success' , 'Complely New Shop');
        } catch (Exception $e) {
            //Write your error message here
            return redirect()->back()->with('error', 'Cant Upate Shop');
        }
    }
}
