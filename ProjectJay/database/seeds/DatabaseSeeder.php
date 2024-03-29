<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoomtypesTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
    }
}
