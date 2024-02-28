<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = "Home";
        // $data['jenis_pohons'] = Jenis_pohon::orderBy('nama')->limit(100)->get();
        // return view('home', $data);
        return view('home', $data);
    }
}
