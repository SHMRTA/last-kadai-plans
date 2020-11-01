<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;   //追加
use App\plan;
use \Auth;
use Carbon\Carbon;  //日数取得の為カーボンライブラリを使用する


class PlansController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    //全てのviewに使える変数を定義する関数 
    public function common(){
        View::share('plan_c');
    }
    
    public function index()
    {
        
        
    }
    
    public function list(){
        
        //登録されている全ユーザを取得
         $users = User::all();
         
        //今日の日付を取得
        $day = new Carbon();
        //taskブレードで使う日付を検証
        //dd($day);
        
        
        //月曜日から日曜日まで日付を取得
        
        //月曜日を週初めと設定
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
            'section_am' => $am,
            'section_pm' => $pm,
            'section_all' => $all_day,
            
            
        ]);
        
        
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
            'plan' => $plans
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
        $plan_c->user_id = Auth::id();
        $plan_c->date = $request->date;
        $plan_c->time_section = $request->time_section;
        $plan_c->content = $request->content;
        $plan_c->save();
        
        //予定一覧ページへ戻る
        return redirect('/plans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        
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
        
    }
}
