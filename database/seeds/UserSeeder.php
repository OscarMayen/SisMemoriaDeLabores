<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name' => 'Super Root',
            'email'=> 'root@root.com',
            'password' => bcrypt('password')
        ])->assignRole('Admin');

       

        //factory(App\User::class, 5)->create();
    }
}
