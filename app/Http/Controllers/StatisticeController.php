<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class StatisticeController extends Controller
{
    public function index(){
        $countProfiles = Profile::count();
        return view('components.Admin.Statistice',compact('countProfiles'))
    }
}
