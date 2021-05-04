<?php

namespace Database\Seeders;

use App\Models\User;
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
        //create and save an admin user.
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@image-plus.co.uk';
        $user->password = bcrypt('depot1');
        $user->hours_worked_day = 7.5;
        $user->authority_level =  array_flip(config('enums.authority_level'))['Admin'];
        $user->manager_id = 1; 
        $user->save();
        //create 10 users
        User::factory(10)->hasAllowances()->create();
        //get user with id of 1 from DB and make his auth level 1
        $user2 = User::find(2);
        $user2->authority_level = array_flip(config('enums.authority_level'))['Manager'];
        $user2->save();
        //get user with id of 2  from DB and make his auth level 1
        $user3 = User::find(3);
        $user3->authority_level =  array_flip(config('enums.authority_level'))['Manager'];
        $user3->save();

    }
}
