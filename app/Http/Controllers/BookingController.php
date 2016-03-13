<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use DB;
use Redirect;
use Session;
use View;
use Auth;
use Illuminate\Support\Facades\Input;

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

        if(is_array(Input::get('seat_id')) && count(Input::get('seat_id')) > 0) {

        foreach (Input::get('seat_id') as $key => $value) {
            if (Auth::check()) {
                $booking->email = Auth::user()->email;
            }
            $booking->seat_id = $value;
            $booking->film_id = Input::get('film_id');
            $booking->film = Input::get('film');
            $booking->time = $request->get('time');
            $booking->save();
        }

        return redirect::back();
    }
    }
}
