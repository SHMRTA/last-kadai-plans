@extends('layouts.app')

@section('content')
    <h1>予定新規作成ページ</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($plan,['route' => 'plan.store']) !!}
                <div class="form-group">
                    {!! Form::label('date','日付') !!}
                    {!! Form::date('date',\Carbon\Carbon::now(),['class' => 'from-control']) !!}
                 </div>   
                 
                 <div class="form-group">
                    {!! Form::label('time_section','時間区分') !!}
                    {!! Form::select('time_section',['1','2','3','4','5','6','7'],['class' => 'form-control']) !!}
                 </div>  
                   
                <div class="form-group">    
                    {!! Form::label('content','予定') !!}
                    {!! Form::text('content',null,['class' => 'form-control']) !!}
                </div>   
                    {!! Form::submit('予定作成',['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>
@endsection