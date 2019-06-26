<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $sales=auth()->user()->sales;
        $commissions=auth()->user()->commissions;
        foreach ($commissions as $commission) {
            $value=$commission->value;
            return $value;
        }
        return view('home', compact('sales', 'value'));
    }
}
