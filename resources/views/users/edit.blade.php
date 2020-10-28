@extends('layouts.app')

@section('content')

    <h1>ユーザの編集ページ</h1>
    
    <div class="row">
        {!! Form::model($user,['route'=>['user.update',$user->id],'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name','名前：') !!}
                {!! Form::text('name',null,['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('email','Eメール') !!}
                {!! Form::email('email',old('name'),['class' => 'form-control']) !!}
            </div>
                
            <div class="form-group">
                 {!! Form::label('password','パスワード') !!}
                 {!! Form::password('password',['class' => 'form-control']) !!}
            </div> 
            
            {!! Form::submit('更新',['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection