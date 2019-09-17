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
        $this->call([

            //Seeds necessary for the application to work
            //Initialize this only once after deployment
            WebAppSeeds::class,

            //Fake seeds for testing
            FakeSeeds::class,
        ]);
    }
}