<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
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
            // "shop_address" => "string",
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
            return redirect()->back()->with('error', 'Cant Updated Shop');
        }
    }

    public function editShop(Request $request)
    {
        $this->validate($request, [
            "id" => "required",
            "map_position_x" => "required",
            "map_position_y" => "required",
            "shop_name" => "required|min:1",
            "map_id" => "required",
            "is_delete" => "string"
        ]);

        try {
            $updatedShop = Shop::whereId($request->id);

            if ($request->is_delete === 'true') {
                $updatedShop->delete();
                return redirect()->back()->with('success' , 'Successfully Deleted Shop');
            } else {
                $updatedShop->update([
                    "id" => $request->id,
                    "map_position_x" => $request->map_position_x,
                    "map_position_y" => $request->map_position_y,
                    "shop_name" => $request->shop_name,
                    "shop_address" => $request->shop_address,
                    "map_id" => $request->map_id,
                ]);
            }
            return redirect()->back()->with('success' , 'Successfully Updated Shop');
        } catch (Exception $e) {
            //Write your error message here
            return redirect()->back()->with('error', 'Cant Updated Shop');
        }
    }

    public function getAllShopList(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $queryName = $request->query('shop_name');
        $queryAddress = $request->query('shop_address');

        $searchDate = $request->query('search_date');
        if ($searchDate) {
            $date = explode(' - ', $searchDate);
            if (count($date) > 1) {
                $startOfDay = Carbon::parse($date[0])->startOfDay()->format('Y-m-d H:i:s');
                $endOfDay = Carbon::parse($date[1])->endOfDay()->format('Y-m-d H:i:s');
            }
        }

        if ($user->role_id === 1) {
            // Admin
            $shopQuery = Shop::orderBy('id', 'DESC');
        } else {
            $shopQuery = Shop::orderBy('id', 'DESC')->where('user_id', $userId);
        }

        if ($searchDate) {
            $shopQuery->whereBetween('created_at', [$startOfDay, $endOfDay]);
        }

        if ($queryName) {
            $shopQuery->where('shop_name', 'LIKE', "%{$queryName}%");
        }

        if ($queryAddress) {
            $shopQuery->where('shop_address', 'LIKE', "%{$queryAddress}%");
        }


        $shops = $shopQuery->paginate(10);

        return view('shop-list', [
            'shops' => $shops,
            'queryName' => $queryName,
            'queryAddress' => $queryAddress,
            'searchDate' => $searchDate ?? '',
            'user' => $user
        ]);
    }
}
