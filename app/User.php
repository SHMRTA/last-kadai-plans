<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\plan;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    //planもモデルとの関係を定義
    public function plans(){
        return $this->hasMany(Plan::class);
    }
    
    //予定のある日付を取得する
    public function getPlanForDay($day,$section){
       $i = $this->plans()->where('date',$day)->where('time_section',$section)->first();
       //dd($day,$section);
       //dd($this->plans);
        return $this->plans()->where('date',$day)->where('time_section',$section)->first();
        
    }
    //各ユーザに指定された日付に予定があるかチェックする
    public function isTherePlanForDay($date,$section){
        $plan_exit = $this->plans()->where('date',$date)->where('time_section',$section)->exists();
        //dd($plan_exit);
         return $this->plans()->where('date',$date)->where('time_section',$section)->exists();
        
    }
   
}
