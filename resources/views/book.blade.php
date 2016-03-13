@extends('layouts.master')
@section('content')
    <div class="seats">
        <div id="seat-map">
            <div class="front">SCREEN</div>
        </div>
        <div class="booking-details">
            <form id="bookingForm" action="bookings/save" method="POST">
                <p>Movie: <span> <input name="film" id="film" value="{{ $title = DB::table('films')->orderBy('id')->value('film') }}" readonly></span></p>
                    <p>Time: <span> <input name="time" id="time" value="{{ $id = DB::table('bookings')->where('film', '=', $title)->value('time') }}" readonly></span></p>
                        <p>Seat: </p>
                        <ul name="selected-seats" id="selected-seats"></ul>
                        <p>Tickets: <span id="counter">0</span></p>
                        <p>Total: <b>$<span id="total">0</span></b></p>
                            <p id="id" class="hidden form-control">{{ $id = DB::table('films')->where('film', '=', $title)->value('id') }}</p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="checkout-button">BUY</button>
                <div id="legend"></div>
            </form>
        </div>
        <div style="clear:both"></div>
    </div>
@stop