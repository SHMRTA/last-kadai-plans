<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;   //追加
use App\plan;
use Carbon\Carbon;  //日数取得の為カーボンライブラリを使用する


class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
        
    }
    
    public function list(){
        
        //ユーザ取得
         $users = User::all();
         
        //$mi = new Carbon('2020-12-15');
        
        //今日の日付を取得
        $day = new Carbon();
        
        
        //月曜日から日曜日まで日付を取得
        $monday = Carbon::now()->startOfWeek();
        $tuesday = $monday->copy()->addDay();
        $wednesday = $tuesday->copy()->addDay();
        $thursday = $wednesday->copy()->addDay();
        $friday = $thursday->copy()->addDay();
        $saturday = $friday->copy()->addDay();
        $sunday = $saturday->copy()->addDay();
        
        
        
        
        return view('plans.task',[
            'users' => $users,
            'day' => $day,
            'monday'=> $monday,
            'sunday'=> $sunday,
            
            ]);
        //return view('plans.task');
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     //
    public function create()
    {
        $plans = new Plan;
        //予定登録ページを表示
        return view('plans.create',[
            'plans' => $plans,
            ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //予定を作成
        $plan_c = new Plan;
        $plan_c->date = $request->date;
        $plan_c->time_section = $request->time_section;
        $plan_c->content = $request->content;
        
        //戻る
        return view('plans.task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
