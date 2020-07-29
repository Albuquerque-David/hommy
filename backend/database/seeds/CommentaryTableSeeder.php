<?php

use Illuminate\Database\Seeder;

class CommentaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory (App\Commentary::class,10)->create();
    }
}
