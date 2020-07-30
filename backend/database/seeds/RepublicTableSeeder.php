<?php

use Illuminate\Database\Seeder;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory (App\Republic::class,10)->create()->each(function($republic){
            $comments = factory(App\Commentary::class, 2)->make();
            $republic->comments()->saveMany($comments);
        });
    }
}
