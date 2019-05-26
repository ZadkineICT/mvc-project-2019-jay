<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Hotel::class, 10)->create()
            ->each(function($hotel)
            {
                // Hier maak je dan per hotel x aantal rooms. Dat zie je bij rand()

                $hotel->room()->saveMany(factory(\App\Room::class, rand(0,50))
                ->create(['hotel_id' => $hotel->id]));
            });
    }
}
