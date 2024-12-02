<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashSettingController extends Controller
{
    public function index(){
    return view('main.dashsettingPage');
}
}
