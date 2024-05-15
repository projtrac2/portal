<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()  
    {
        return view('reviews.reviews');
    }

    public function testWeeks()  
    {
        $textdt="01 jan 2011";
        $currdt= strtotime( $textdt);
        $nextmonth=strtotime($textdt."+1 month");
        $i=0;
        $flag=true;

        return view('reviews.reviews');
    }
}
