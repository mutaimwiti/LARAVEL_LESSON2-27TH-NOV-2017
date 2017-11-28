<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function($user) {
            foreach(range(1,5) as $i){
                $user->blogs()->save(factory(App\Blog::class)->make());
            }
        });
    }
}

