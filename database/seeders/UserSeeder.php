<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user = new User();
		$user->name = "Wahid Mustaqim";
		$user->email = "aqim@kmc.com";
		$user->email_verified_at = Carbon::now();
		$user->password = Hash::make("12345678");
		$user->save();
	}
}
