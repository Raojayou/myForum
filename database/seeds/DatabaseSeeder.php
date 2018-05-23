<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create()->each(function (App\User $user) {
            factory(\App\Topic::class, 5)->create([
                'user_id' => $user->id]);
//          factory(App\Comment::class, 1)->create([
//              'post_id' => 1
//          ]);
        });
    }
}


