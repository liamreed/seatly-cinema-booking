<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            'seat_id' => "9_4",
            'film'=> "London Has Fallen",
            'film_id'=> 1,
            'time' => "	2016-03-08T21:20:39+00:00"
        ]);

        DB::table('bookings')->insert([
            'seat_id' => "9_2",
            'film' => "London Has Fallen",
            'film_id' => 1,
            'time' => "2016-03-08T21:22:10+00:00"
        ]);
    }
}
