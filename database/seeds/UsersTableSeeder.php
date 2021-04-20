<?php

use Illuminate\Database\Seeder;
use App\{User};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

    	$user = new User();
    	$user->name = "Administrador";
    	$user->password = Hash::make('admin');
    	$user->email = 'admin@livedesign.org';
    	$user->save();

    	$user->assignRole('Administrator');

    }
}
