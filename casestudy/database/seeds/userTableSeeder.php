<?php

use Illuminate\Database\Seeder;
use App\User;
class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name ='Admin';
        $user->email='testAdnin@gmail.com';
        $user->password = bcrypt(12345678);
        $user->role =1;
        $user->save();

        $user = new User();
        $user->name ='User';
        $user->email='testUser@gmail.com';
        $user->password = bcrypt(12345678);
        $user->role =0;
        $user->save();
    }
}
