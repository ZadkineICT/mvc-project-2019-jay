<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 1)
            ->create(['name' => 'jay',
                      'email' => 'jay@hotel.com',
                      'password' => bcrypt('jay')])
            ->each(function (User $user){
                $user->assignRole('owner');
            });

        factory(App\User::class, 1)
            ->create(['name' => 'AkashMod',
                'email' => 'akashmod@hotel.com',
                'password' => bcrypt('punjabislayer')])
            ->each(function (User $user){
                $user->assignRole('admin');
            });

        factory(App\User::class, 1)
            ->create(['name' => 'client',
                'email' => 'client@hotel.com',
                'password' => bcrypt('client')])
            ->each(function (User $user){
                $user->assignRole('client');
            });

        factory(App\User::class, 10)->create();
    }
}
