<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Listing;

class HomeController extends Controller
{
    public function index(){
        
        $listings = Listing::orderBy('created_at', 'DESC')->get();

        return view('index', ['listings' => $listings]);
        
    }
}
