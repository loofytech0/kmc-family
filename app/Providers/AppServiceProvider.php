<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot(Request $request)
	{
		config(["app.locale" => "id"]);
		Carbon::setLocale("id");
	}
}
