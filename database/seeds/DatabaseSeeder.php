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
        // $this->call(MembersTableSeeder::class);
         $this->call(SongsTableSeeder::class);
        //$this->call(ArtistsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
