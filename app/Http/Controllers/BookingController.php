<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use DB;

class BookingController extends Controller
{
    function getSeats($id) {

        $seats = Booking::where('film_id', '=', $id)
            ->orderBy('seat_id', 'ASC')
            ->get([
                DB::raw('seat_id as seat_id')
            ])
            ->toJSON();
        return $seats;
    }

    public function saveSeats(Request $request)
    {
        $booking = new Booking();
        $keys = array_keys($request);
        foreach($keys as $key)
        {
            $booking->seat_id = $request->get('seat_id');
            $booking->film_id = $request->get('film_id');
            $booking->time = $request->get('time');
        }
        $booking->save();
        return redirect::back();
    }
}
