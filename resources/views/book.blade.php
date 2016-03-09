@extends('layouts.master')
@section('content')
    <div class="seats">
        <div id="seat-map">
            <div class="front">SCREEN</div>
        </div>
        <div class="booking-details">
            <form id="bookingForm" action="booking/save">
            <p>Movie: <span> {{ $title = DB::table('films')->orderBy('id')->value('film') }}</span></p>
            <p>Time: <span>{{ $id = DB::table('bookings')->where('film', '=', $title)->value('time') }}</span></p>
            <p>Seat: </p>
            <ul id="selected-seats"></ul>
            <p>Tickets: <span id="counter">0</span></p>
            <p>Total: <b>$<span id="total">0</span></b></p>
                <p id="id" class="hidden">{{ $id = DB::table('films')->where('film', '=', $title)->value('id') }}</p>
            <button class="checkout-button">BUY</button>
            <div id="legend"></div>
            </form>
        </div>
        <div style="clear:both"></div>
    </div>
@stop