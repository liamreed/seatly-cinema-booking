<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use DB;
use Redirect;
use Session;
use View;

class BookingController extends Controller
{
    function getBookId($id) {

        View::make('book')->with('id', $id);

}
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
        dd($request);

        foreach ($this->request->get('seat_id') as $key => $value) {
            $booking->seat_id = $request->get('seat_id');
            $booking->film_id = $request->get('film_id');
            $booking->time = $request->get('time');
            $booking->save();
        }

        return redirect::back();
    }
}
