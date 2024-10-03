<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $role = DB::table('model_has_roles')->where('model_id', Auth::user()->id)->get();
        $role_name = DB::table('roles')->where('id', $role[0]->role_id)->first()->name;
        if ($role_name == 'Admin') {
            $show = DB::table('registration')
                ->pluck('user_id')
                ->unique()
                ->toArray();
        } else {
            $show = DB::table('registration')
                ->where('user_id', Auth::id())
                ->pluck('user_id')
                ->toArray();
        }

        $all_check = DB::table('registration')
            ->join('users', 'registration.user_id', '=', 'users.id')
            ->join('products', 'registration.event_id', '=', 'products.id')
            ->whereIn('registration.user_id', $show)
            ->get();

        $all_check = $all_check->map(function ($item) {
            $item->booked_from_date = date('Y-m-d', strtotime($item->booked_from));
            $item->booked_to_date = date('Y-m-d', strtotime($item->booked_to));
            $item->booked_from_hours = date('H:i', strtotime($item->booked_from));
            $item->booked_to_hours = date('H:i', strtotime($item->booked_to));
            $item->deference = Carbon::parse($item->booked_from)->diffInMinutes(Carbon::parse($item->booked_to));
            $item->user_checked = DB::table('registration')->where('event_id', $item->id)->count();
            $item->owner = User::find($item->user_id)->name;

            return $item;
        });

        return view('home', [
            'products' => $all_check,
        ]);
    }
}