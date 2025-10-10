<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $banners = DB::table('banners')->get();
        $about_us = DB::table('about_us')->get();
        return view('home' ,compact('banners','about_us'));
    }
}
