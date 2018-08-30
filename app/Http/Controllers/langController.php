<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class langController extends Controller
{
    public function change($lang = 'en'){
    	session::put('lang',$lang);
    	return redirect()->back();
    }
    
}
