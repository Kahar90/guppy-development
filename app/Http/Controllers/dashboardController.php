<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class dashboardController extends Controller
{
    

    // pull data from database
    public function index()
    {
    

        if (Auth::user()->role == 'admin') {

            $complaints=[];
            $bookings=[];

            return view('dashboard', ['complaints' => $complaints, 'bookings' => $bookings]);

        } else {
             // get complaints and booking data related to the user
            $complaints = DB::table('complaints')->get(
            )->where('user_id', '=', Auth::user()->id);
    
    
            $bookings = DB::table('bookings')->get()->where('user_id', '=', Auth::user()->email);
    
    
            return view('dashboard', ['complaints' => $complaints, 'bookings' => $bookings]);
        }


        

    }

}
?>