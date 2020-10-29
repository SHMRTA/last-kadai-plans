@extends('layouts.app')

@section('content')
    <h1>予定新規作成ページ</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($plan,['route' => 'plans.store']) !!}
                <div class="form-group">
                    {!! Form::lavel('date','日付') !!}
                    {!! Form::date('date',\Carbon\Carbon::now(),['class' => 'from-control']) !!}
                 </div>   
                 
                 <div class="form-group">
                    {!! Form::lavel('time_section','時間区分') !!}
                    {!! Form::select('time_section',['1','2','3','4','5','6','7'],['class' => 'form-control']) !!}
                 </div>  
                   
                <div class="form-group">    
                    {!! Form::lavel('content','予定') !!}
                    {!! Form::text('content',null,['class' => 'form-control']) !!}
                </div>   
                    {!! Form::submit('作成',['class' => 'btn-primary']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>
@endsection