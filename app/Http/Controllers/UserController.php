<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;   //追加

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        //ログイン後の処理
        if(\Auth::check()){
            
            //認証済ユーザを取得
            $user = \Auth::user();
            
            //リダイレクト
           return view('plans.index');
           
        }else{
            //ログインしていないのでログイン画面を表示する
            return view('auth/login');
        }
        
    }
    
    
    
    //一覧ページを表示するメソッドを追加
    public function list(){
        
        //全てのユーザを取得
        $users = User::all();
        
        //ユーザ一覧を表示する
            return view('plans.user_list',[
             'users' => $users
             ]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
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
        //
    }
    
    
}
