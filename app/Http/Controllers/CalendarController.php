<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendar\CalendarView;  //追記

class CalendarController extends Controller
{
    //
    public function show(){
        $calendar = new CalendarView(time());
        
        return view('plans.calendar',[
            "calendar" => $calendar
            ]);
    }
}
