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
            $tenant = factory(App\Tenant::class)->make();            
            $republic->tenant()->save($tenant);

            $comments = factory(App\Comment::class, 2)->make();
            $repubic->comments()->saveMany($comments);
        });
    }
}
