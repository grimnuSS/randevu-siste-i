<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class indexController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}
