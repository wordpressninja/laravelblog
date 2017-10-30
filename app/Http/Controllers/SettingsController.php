<?php

namespace App\Http\Controllers;
use App\Setting;
use Session;
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
    	$this->validate(request(), [
    		'siteName' => 'required', 
    		'contactEmail' => 'required',
    		'contactPhone' => 'required',
    		'contactAddress' => 'required'
    	]);
    	$settings = Setting::first();
    	$settings->site_name = request()->siteName;
    	$settings->address = request()->contactAddress;
    	$settings->contact_email = request()->contactEmail;
    	$settings->contact_number = request()->contactPhone;
    	$settings->save();

    	Session::flash('success', 'User have updated your site settings.');
    	return redirect()->back();
    }
}
