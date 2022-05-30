<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Shop;
use App\Models\User;
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
        $user = User::findOrFail($userId);
        $map = Map::where('user_id', $userId)->latest('created_at')->first();
        $shop_list = Shop::where('user_id', $userId)->get();

        return view('home', [
            'map' => $map,
            'shop_list' => $shop_list ? $shop_list : [],
            'user' => $user
        ]);
    }

    public function showLackOfKnowledge()
    {
        return view('lack-of-knowledge');
    }
}
