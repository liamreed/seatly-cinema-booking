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
                            <input id="film_id" name="film_id" class="hidden" value="{{ $id = DB::table('films')->where('film', '=', $title)->value('id') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="checkout-button">BUY</button>
                <div id="legend"></div>
            </form>
        </div>
        <div style="clear:both"></div>
    </div>

<hr>
    <h3>Table for demo purposes</h3>
    <div class="container">
                <div class="table-responsive">
                                <table id="allSites" class="table table-condensed">
                                    <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>SEAT_ID</th>
                                        <th>FILM</th>
                                        <th>FILM ID</th>
                                        <th>CREATED_AT</th>
                                        <th>UPDATED_AT</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                {{ $bookings = DB::table('bookings')->simplePaginate(15) }}
                                    @foreach ($bookings as $booking)
                                        <tr class="siteRow">
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->seat_id }}</td>
                                            <td>{{ $booking->film }} </td>
                                            <td>{{ $booking->film_id }}</td>
                                            <td>{{ $booking->created_at }}</td>
                                            <td>{{ $booking->updated_at }}</td>
                            
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div><!--  /.table-responsive -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        {{ $sites = DB::table('bookings')->count() }} booked tickets
                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
            <!-- ./col -->
        </div>
        </div>
    <!-- /.row -->
@stop

