<?php

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Artist::class, 8)->create();
    }
}
