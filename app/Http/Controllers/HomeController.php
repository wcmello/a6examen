<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Car;
use App\File;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'carcount' =>  Car::count(),
            'filecount' => File::count(),
            'keycount' => Car::sum('keyamount'),
            'soldcount' => Car::where('sold', 1)->count()
        ];
        return view('home', $data);
    }
    public function logout()
    {   
        Auth::logout();
        return redirect('login');
    }
}
