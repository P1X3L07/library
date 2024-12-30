<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard (home page).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home'); // This will return the home.blade.php view
    }
}