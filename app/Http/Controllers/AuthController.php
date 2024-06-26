<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function login() {
		if (Auth::user()) return redirect()->route("dashboard");
		return view("auth.login");
	}

	public function loginPost(Request $request) {
		try {
			$user = User::where("email", $request->email . "@loofyapp.my.id")->first();
			if (!$user) throw new \Exception("Email or password salah 1");

			$password = Hash::check($request->password, $user->password);
			if (!$password) throw new \Exception("Email or password salah 2");

			$credentials = [
				"email" => $user->email,
				"password" => $request->password
			];

			if (Auth::attempt($credentials)) {
				return redirect()->route("dashboard");
			}

			throw new \Exception("Email atau password salah 3");
		} catch (\Exception $e) {
			return redirect()->back()->with(["error" => $e->getMessage()]);
		}
	}

	public function logout() {
		Auth::logout();
		return redirect()->route("login");
	}
}
