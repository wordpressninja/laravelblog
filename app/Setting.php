<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $fillable = ['site_name', 'address', 'contact_email', 'contact_number'];	
}
