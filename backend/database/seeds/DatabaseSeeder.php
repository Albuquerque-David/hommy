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
        // $this->call(UserSeeder::class);
        $this->call(RentersTableSeeder::class);
        $this->call(TenantTableSeeder::class);
        $this->call(CommentaryTableSeeder::class);
        $this->call(RepublicTableSeeder::class);
    }
}
