<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();
        $map = Map::latest('created_at')->first();
        $shop_list = Shop::where('user_id', $userId)->get();

        dd($shop_list);
        return view('home', [
            'map' => $map,
            'shop_lilst' => $shop_list,
        ]);
    }
}
