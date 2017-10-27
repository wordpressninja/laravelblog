<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
    public function index()
    {
    	return view('admin.settings.settings')->with('settings', Setting::first());
    }

    public function update()
    {
    	$settings = Setting::first();
    	return redirect()->back();
    }
}
