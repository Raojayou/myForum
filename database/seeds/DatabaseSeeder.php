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
        factory(App\User::class, 1)->create([
            'role' => 'admin'
        ]);

        factory(App\User::class, 5)->create()->each(function (App\User $user) {
            factory(\App\Topic::class, 1)->create([
                'user_id' => $user->id]);
//          factory(App\Reply::class, 1)->create([
//              'replies_id' => 1
//          ]);
        });
    }
}


