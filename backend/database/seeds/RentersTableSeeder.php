<?php

use Illuminate\Database\Seeder;

class RentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\Renter::class,10)->create();
    }
}
