<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
   

    public function index()
    {
        $bookings = DB::table('bookings')->get();
        // get items from database
        $items = DB::table('items')->get();


        return view('bookings', ['bookings' => $bookings, 'items' => $items]);
    }

    public function confirm(Request $request) {
        // delete the booking from the database
        $booking_id = $request->input('booking_id');
        DB::table('bookings')->where('id', $booking_id)->delete();

        return view('confirmBookingSuccess');
    }
}

?>