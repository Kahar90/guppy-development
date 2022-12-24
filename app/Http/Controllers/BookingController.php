<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {

    }
        

    public function index()
    {
        $bookings = DB::table('bookings')->get();
        // get items from database
        $items = DB::table('items')->get();

        
        return view('bookings', ['bookings' => $bookings, 'items' => $items]);


    }

}

?>