<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    //
    protected $guarder = ['id'];
    protected $dates = ['date'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
