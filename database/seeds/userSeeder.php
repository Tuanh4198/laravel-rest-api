<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
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
        	"name" => "ha manh",
		    "email" => "admin@gmail.com",
		    "phone" => 01234567,
		    "active" => 1,
		    "password" => Hash::make("1233456"),
        ]);
    }
}
