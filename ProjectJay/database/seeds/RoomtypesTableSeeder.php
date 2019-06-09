<?php

use Illuminate\Database\Seeder;

class RoomtypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Roomtype::class, 3)->create();
    }
}
